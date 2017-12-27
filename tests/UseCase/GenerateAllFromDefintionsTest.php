<?php

declare(strict_types=1);

namespace Tests\UseCase;

use Generator;
use League\Tactician\CommandBus;
use NullDevelopment\Skeleton\File\FileFactory;
use NullDevelopment\Skeleton\Path\Readers\FinderFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoaderCollection;
use SplFileInfo;
use Symfony\Component\Filesystem\Filesystem;
use Tests\TestCase\SfTestCase;
use Throwable;

class GenerateAllFromDefintionsTest extends SfTestCase
{
    public function testAll()
    {
        $loaderCollection = $this->getService(DefinitionLoaderCollection::class);
        $commandBus       = $this->getService(CommandBus::class);
        $fileSystem       = $this->getService(Filesystem::class);
        $fileFactory      = $this->getService(FileFactory::class);

        $generateList = ['SingleValueObject', 'SimpleIdentifier', 'DateTimeValueObject', 'SimpleEntity', 'SimpleCollection'];
        //$generateList = ['SingleValueObject', 'SimpleIdentifier', 'DateTimeValueObject'];
        $generateList = ['SimpleCollection'];

        foreach ($this->provideInput() as $input) {
            if (false === in_array($input['type'], $generateList)) {
                continue;
            }
            try {
                $definition = $loaderCollection->findAndLoad($input);

                $results = $commandBus->handle($definition);

                self::assertCount(3, $results);
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
        self::assertTrue(true);
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
}
