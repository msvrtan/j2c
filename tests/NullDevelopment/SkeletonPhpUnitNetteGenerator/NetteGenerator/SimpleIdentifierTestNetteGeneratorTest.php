<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteGenerator;

use League\Tactician\CommandBus;
use NullDevelopment\Skeleton\SourceCode\Loader\SimpleIdentifierLoader;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteGenerator\SimpleIdentifierTestNetteGenerator;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteGenerator\SimpleIdentifierTestNetteGenerator
 * @group  generator
 */
class SimpleIdentifierTestNetteGeneratorTest extends SfTestCase
{
    /** @var SimpleIdentifierLoader */
    private $loader;
    /** @var SimpleIdentifierTestNetteGenerator */
    private $generator;
    /** @var CommandBus */
    private $commandBus;

    public function setUp()
    {
        parent::setUp();
        $this->loader     = $this->getService(SimpleIdentifierLoader::class);
        $this->generator  = new SimpleIdentifierTestNetteGenerator();
        $this->commandBus = $this->getService(CommandBus::class);
    }

    /** @dataProvider provideYamlConfigurationNames */
    public function testBuilderRun(string $configurationName)
    {
        // Arrange
        $inputConfig     = $this->loadDefinitionYaml($configurationName.'.yaml');
        $classDefinition = $this->loader->load($inputConfig);

        // Act
        $namespace = $this->generator->generate($classDefinition);

        $output = $this->prepareForOutput($namespace->__toString());

        // Assert
        self::assertEquals(file_get_contents(__DIR__.'/output/'.$configurationName.'Test.output'), $output);
    }

    public function provideYamlConfigurationNames(): array
    {
        return [
            ['MyVendor/User/UserId'],
            ['MyVendor/Product/ProductId'],
        ];
    }

    private function prepareForOutput(string $result): string
    {
        $result = str_replace("\t", '    ', $result);

        return '<?php'.PHP_EOL.PHP_EOL.'declare(strict_types=1);'.PHP_EOL.PHP_EOL.$result;
    }
}
