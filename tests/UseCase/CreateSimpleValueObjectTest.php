<?php

declare(strict_types=1);

namespace Tests\UseCase;

use App\File\FileFactory;
use League\Tactician\CommandBus;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\SourceCode\Loader\SimpleValueObjectLoader;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\Loader\SimpleValueObjectLoader
 * @group  usecase
 */
class CreateSimpleValueObjectTest extends SfTestCase
{
    /** @var SimpleValueObjectLoader */
    private $loader;
    /** @var CommandBus */
    private $commandBus;

    public function setUp()
    {
        parent::setUp();
        $this->loader     = $this->getService(SimpleValueObjectLoader::class);
        $this->commandBus = $this->getService(CommandBus::class);
    }

    /**
     * @dataProvider provideYamlConfigurationNames
     */
    public function testBuilderRun(string $configurationName)
    {
        // Arrange
        $inputConfig     = $this->loadDefinitionYaml($configurationName.'.yaml');
        $classDefinition = $this->loader->load($inputConfig);

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

        self::assertTrue(true);
    }

    public function provideYamlConfigurationNames(): array
    {
        return [
            ['MyVendor/User/Username'],
        ];
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
