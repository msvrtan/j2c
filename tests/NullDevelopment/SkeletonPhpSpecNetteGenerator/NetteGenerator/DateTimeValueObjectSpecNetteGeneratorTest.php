<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteGenerator;

use League\Tactician\CommandBus;
use NullDevelopment\Skeleton\SourceCode\Loader\DateTimeValueObjectLoader;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteGenerator\DateTimeValueObjectSpecNetteGenerator;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteGenerator\DateTimeValueObjectSpecNetteGenerator
 * @group  generator
 */
class DateTimeValueObjectSpecNetteGeneratorTest extends SfTestCase
{
    /** @var DateTimeValueObjectLoader */
    private $loader;
    /** @var DateTimeValueObjectSpecNetteGenerator */
    private $generator;
    /** @var CommandBus */
    private $commandBus;

    public function setUp()
    {
        parent::setUp();
        $this->loader     = $this->getService(DateTimeValueObjectLoader::class);
        $this->generator  = new DateTimeValueObjectSpecNetteGenerator();
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
        self::assertEquals(file_get_contents(__DIR__.'/output/'.$configurationName.'Spec.output'), $output);
    }

    public function provideYamlConfigurationNames(): array
    {
        return [
            ['UserCreatedAt'],
            //['UsernameSpec'],
        ];
    }

    private function prepareForOutput(string $result): string
    {
        $result = str_replace("\t", '    ', $result);

        return '<?php'.PHP_EOL.PHP_EOL.'declare(strict_types=1);'.PHP_EOL.PHP_EOL.$result;
    }
}
