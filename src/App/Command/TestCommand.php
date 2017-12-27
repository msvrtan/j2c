<?php

declare(strict_types=1);

namespace App\Command;

use Generator;
use League\Tactician\CommandBus;
use NullDevelopment\Skeleton\File\FileFactory;
use NullDevelopment\Skeleton\Path\Readers\FinderFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoaderCollection;
use SplFileInfo;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;
use Throwable;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class TestCommand extends ContainerAwareCommand
{
    protected static $defaultName = 'test:1';

    protected function configure()
    {
        $this
            ->setDescription('Test');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io               = new SymfonyStyle($input, $output);
        $loaderCollection = $this->getService(DefinitionLoaderCollection::class);
        $commandBus       = $this->getService(CommandBus::class);
        $fileSystem       = $this->getService(Filesystem::class);
        $fileFactory      = $this->getService(FileFactory::class);

        foreach ($this->provideInput() as $input) {
            try {
                $definition = $loaderCollection->findAndLoad($input);

                $results = $commandBus->handle($definition);

                foreach ($results as $result) {
                    $fileName = $fileFactory->getPath2($result->getClassType()->getName());

                    $generated = $result->getGenerated();
                    $output    = '<?php'.PHP_EOL.PHP_EOL.'declare(strict_types=1);'.PHP_EOL.PHP_EOL.str_replace("\t", '    ', $generated);
                    $fileSystem->dumpFile($fileName, $output);
                }
            } catch (Throwable $exception) {
                echo $exception->getMessage().PHP_EOL;
            }
        }

        $io->writeln('Finished!');
    }

    protected function getService(string $name)
    {
        return $this->getContainer()->get($name);
    }

    public function provideInput(): Generator
    {
        $path  = getcwd().'/definitions';
        $yamls = $this->getService(FinderFactory::class)->create()->files()->in($path)->name('*.yaml');

        /** @var SplFileInfo $yaml */
        foreach ($yamls as $yaml) {
            $config = $this->loadDefinitionYaml($yaml->getFilename(), $yaml->getPath());
            yield $config;
        }
    }

    protected function loadDefinitionYaml(string $fileName, ?string $path = null): array
    {
        // Define path
        if (null === $path) {
            $path = getcwd().'/definitions/'.$fileName;
        } else {
            $path .= '/'.$fileName;
        }

        // Load Yaml file content
        $fileContent = file_get_contents($path);

        // Parse content
        $parsedYaml = Yaml::parse($fileContent);

        // Return definition part.
        return $parsedYaml['definition'];
    }
}
