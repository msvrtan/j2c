<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpSpec\Definition\SpecSimpleIdentifier;
use NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecSimpleIdentifierGenerator;
use NullDevelopment\Skeleton\PhpSpec\Method\GetterSpecMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\InitializableMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\LetMethod;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecSimpleIdentifierGenerator
 * @group  integration
 */
class SpecSimpleIdentifierGeneratorTest extends SfTestCase
{
    /** @var SpecSimpleIdentifierGenerator */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SpecSimpleIdentifierGenerator::class);
    }

    /** @dataProvider provideSpecSimpleIdentifier */
    public function testSupports(SpecSimpleIdentifier $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideSpecSimpleIdentifier */
    public function testGenerateAsString(SpecSimpleIdentifier $definition, string $fileName)
    {
        $fileName = __DIR__.'/output/'.$fileName;
        $expected = @file_get_contents($fileName);

        $result = $this->sut->generateAsString($definition);

        if (true === empty($expected)) {
            file_put_contents($fileName, $result);
            self::markTestSkipped('Generating output for '.$fileName);
        } else {
            self::assertEquals($expected, $result);
        }
    }

    /** @dataProvider provideSpecSimpleIdentifier */
    public function testGenerate(SpecSimpleIdentifier $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideSpecSimpleIdentifier(): array
    {
        $sutClass = ClassName::create('MyVendor\\Webshop\\UserEntity');

        $firstName = new Property('firstName', ClassName::create('MyVendor\\User\\UserFirstName'), false, false, false, new Visibility('private'));

        $class  = ClassName::create('spec\\MyVendor\\Webshop\\UserEntitySpec');
        $parent = ClassName::create('PhpSpec\\ObjectBehavior');

        $letMethod           = new LetMethod([$firstName]);
        $initializableMethod = new InitializableMethod($sutClass, null, []);
        $exposesFirstName    = new GetterSpecMethod('it_exposes_first_name', 'getFirstName', $firstName);
        $exposesValue        = new GetterSpecMethod('it_exposes_value', 'getValue', $firstName);

        return [
            [
                new SpecSimpleIdentifier($class, $parent, [], [], [], [$letMethod, $initializableMethod, $exposesFirstName, $exposesValue]),
                'single_value_object.empty.output',
            ],
        ];
    }
}