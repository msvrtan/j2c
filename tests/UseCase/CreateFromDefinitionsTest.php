<?php

declare(strict_types=1);

namespace Tests\UseCase;

use App\Config\Path\Readers\FinderFactory;
use App\File\FileFactory;
use League\Tactician\CommandBus;
use NullDevelopment\Skeleton\Core\ObjectConfigurationLoaderCollection;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\SplFileInfo;
use Tests\TestCase\SfTestCase;

/**
 * @group  usecase
 */
class CreateFromDefinitionsTest extends SfTestCase
{
    /** @var ObjectConfigurationLoaderCollection */
    private $loaders;
    /** @var CommandBus */
    private $commandBus;

    public function setUp()
    {
        parent::setUp();
        $this->loaders    = $this->getService(ObjectConfigurationLoaderCollection::class);
        $this->commandBus = $this->getService(CommandBus::class);
    }

    public function testGenerateAllExistingDefinitions()
    {
        $path  = getcwd().'/definitions';
        $yamls = $this->getService(FinderFactory::class)->create()->files()->in($path)->name('*.yaml');

        /** @var SplFileInfo $yaml */
        foreach ($yamls as $yaml) {
            $config = $this->loadDefinitionYaml($yaml->getFilename());

            $classDefinition = $this->loaders->findAndLoad($config);

            $results = $this->commandBus->handle($classDefinition);

            // Assert
            foreach ($results as $result) {
                $namespaceName = $result->getName();
                foreach (array_keys($result->getClasses()) as $className) {
                    $this->writeFile(
                        new ClassName($className, $namespaceName),
                        $result->__toString()
                    );
                }
            }
        }

        self::assertTrue(true);
    }

    private function getFilePath(ClassName $className): string
    {
        return $this->getService(FileFactory::class)->getPath($className);
    }

    protected function writeFile(ClassName $className, $result)
    {
        $output = '<?php'.PHP_EOL.PHP_EOL.'declare(strict_types=1);'.PHP_EOL.PHP_EOL.str_replace("\t", '    ', $result);

        $fileName = $this->getFilePath($className);

        $this->getService(Filesystem::class)->dumpFile($fileName, $output);
    }
}
