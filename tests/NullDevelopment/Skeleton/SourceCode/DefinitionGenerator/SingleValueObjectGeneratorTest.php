<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use Nette\PhpGenerator\ClassType;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\Skeleton\SourceCode\Definition\SingleValueObject;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\SingleValueObjectGenerator;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\SingleValueObjectGenerator
 * @group  integration
 */
class SingleValueObjectGeneratorTest extends SfTestCase
{
    /** @var SingleValueObjectGenerator */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SingleValueObjectGenerator::class);
    }

    /** @dataProvider provideSingleValueObject */
    public function testSupports(SingleValueObject $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideSingleValueObject */
    public function testGenerateAsString(SingleValueObject $definition, string $fileName)
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

    /** @dataProvider provideSingleValueObject */
    public function testGenerate(SingleValueObject $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(ClassType::class, $result);
    }

    public function provideSingleValueObject(): array
    {
        $class      = ClassName::create('MyVendor\\Webshop\\UserEntity');
        $parent     = ClassName::create('MyVendor\\Core\\BaseModel');
        $interface1 = InterfaceName::create('MyVendor\\Core\\SomeInterface');
        $trait1     = TraitName::create('MyVendor\\Core\\ImportantTrait');
        $firstName  = new Property(
            'firstName',
            ClassName::create('MyVendor\\User\\UserFirstName'),
            false,
            false,
            false,
            new Visibility('private')
        );

        $constructorMethod = new ConstructorMethod([$firstName]);
        $getterMethod      = new GetterMethod('getFirstName', $firstName);
        $getValueMethod    = new GetterMethod('getValue', $firstName);

        return [
            [
                new SingleValueObject($class, null, [], [], [], []),
                'single_value_object.empty.output',
            ],
            [
                new SingleValueObject($class, $parent, [$interface1], [$trait1], [$firstName], []),
                'single_value_object.without_property.output',
            ],
            [
                new SingleValueObject($class, null, [], [], [$firstName], [$constructorMethod, $getterMethod, $getValueMethod]),
                'single_value_object.first_name.output',
            ],
        ];
    }
}
