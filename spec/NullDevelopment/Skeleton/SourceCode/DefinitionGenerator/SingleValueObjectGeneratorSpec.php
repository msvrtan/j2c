<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\Skeleton\SourceCode\Definition\SingleValueObject;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\SingleValueObjectGenerator;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator\ConstructorMethodGenerator;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator\GetterMethodGenerator;
use PhpSpec\ObjectBehavior;

class SingleValueObjectGeneratorSpec extends ObjectBehavior
{
    public function let(
        ConstructorMethodGenerator $constructorMethodGenerator,
        GetterMethodGenerator $getterMethodGenerator
    ) {
        $this->beConstructedWith([$constructorMethodGenerator, $getterMethodGenerator]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SingleValueObjectGenerator::class);
        $this->shouldImplement(DefinitionGenerator::class);
    }

    public function it_supports_single_value_object(SingleValueObject $definition)
    {
        $this->supports($definition)->shouldReturn(true);
    }

    public function it_creates_class_code(SingleValueObject $definition)
    {
        $definition->getClassName()->shouldBeCalled()->willReturn('UserEntity');
        $definition->getNamespace()->shouldBeCalled()->willReturn('MyVendor\\WebShop');
        $definition->hasParent()->shouldBeCalled()->willReturn(false);
        $definition->getInterfaces()->shouldBeCalled()->willReturn([]);
        $definition->getProperties()->shouldBeCalled()->willReturn([]);
        $definition->getMethods()->shouldBeCalled()->willReturn([]);

        $lines = [
            'class UserEntity',
            '{',
            '}',
            '',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($definition)->shouldReturn($expected);
    }

    public function it_creates_class_code_with_parent(SingleValueObject $definition)
    {
        $definition->getClassName()->shouldBeCalled()->willReturn('UserEntity');
        $definition->getNamespace()->shouldBeCalled()->willReturn('MyVendor\\WebShop');
        $definition->hasParent()->shouldBeCalled()->willReturn(true);
        $definition->getParentFullClassName()->shouldBeCalled()->willReturn('MyVendor\\Core\\BaseModel');
        $definition->getInterfaces()->shouldBeCalled()->willReturn([]);
        $definition->getProperties()->shouldBeCalled()->willReturn([]);
        $definition->getMethods()->shouldBeCalled()->willReturn([]);

        $lines = [
            'class UserEntity extends \\MyVendor\\Core\\BaseModel',
            '{',
            '}',
            '',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($definition)->shouldReturn($expected);
    }

    public function it_creates_class_code_with_interfaces(SingleValueObject $definition, InterfaceName $interfaceName)
    {
        $definition->getClassName()->shouldBeCalled()->willReturn('UserEntity');
        $definition->getNamespace()->shouldBeCalled()->willReturn('MyVendor\\WebShop');
        $definition->hasParent()->shouldBeCalled()->willReturn(false);
        $definition->getInterfaces()->shouldBeCalled()->willReturn([$interfaceName]);
        $interfaceName->getFullName()->shouldBeCalled()->willReturn('MyVendor\\Core\\SomeInterface');
        $definition->getProperties()->shouldBeCalled()->willReturn([]);
        $definition->getMethods()->shouldBeCalled()->willReturn([]);

        $lines = [
            'class UserEntity implements \\MyVendor\\Core\\SomeInterface',
            '{',
            '}',
            '',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($definition)->shouldReturn($expected);
    }

    public function it_creates_class_code_with_properties(SingleValueObject $definition, Property $firstName)
    {
        $definition->getClassName()->shouldBeCalled()->willReturn('UserEntity');
        $definition->getNamespace()->shouldBeCalled()->willReturn('MyVendor\\WebShop');
        $definition->hasParent()->shouldBeCalled()->willReturn(false);
        $definition->getInterfaces()->shouldBeCalled()->willReturn([]);
        $definition->getProperties()->shouldBeCalled()->willReturn([$firstName]);

        $firstName->getName()->shouldBeCalled()->willReturn('firstName');
        $firstName->getInstanceFullName()->shouldBeCalled()->willReturn('MyVendor\\WebShop\\User\\UserFirstName');
        $firstName->getVisibility()->shouldBeCalled()->willReturn(new Visibility('private'));
        $firstName->hasDefaultValue()->shouldBeCalled()->willReturn(false);
        $definition->getMethods()->shouldBeCalled()->willReturn([]);

        $lines = [
            'class UserEntity',
            '{',
            "\t".'/** @var MyVendor\WebShop\User\UserFirstName */',
            "\t".'private $firstName;',
            '',
            '',
            '}',
            '',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($definition)->shouldReturn($expected);
    }

    public function it_creates_class_code_with_property_having_default_value(
        SingleValueObject $definition,
        Property $lastName
    ) {
        $definition->getClassName()->shouldBeCalled()->willReturn('UserEntity');
        $definition->getNamespace()->shouldBeCalled()->willReturn('MyVendor\\WebShop');
        $definition->hasParent()->shouldBeCalled()->willReturn(false);
        $definition->getInterfaces()->shouldBeCalled()->willReturn([]);
        $definition->getProperties()->shouldBeCalled()->willReturn([$lastName]);
        $definition->getMethods()->shouldBeCalled()->willReturn([]);

        $lastName->getName()->shouldBeCalled()->willReturn('lastName');
        $lastName->getInstanceFullName()->shouldBeCalled()->willReturn('MyVendor\\WebShop\\User\\UserLastName');
        $lastName->getVisibility()->shouldBeCalled()->willReturn(new Visibility('private'));
        $lastName->hasDefaultValue()->shouldBeCalled()->willReturn(true);
        $lastName->getDefaultValue()->shouldBeCalled()->willReturn('Smith');

        $lines = [
            'class UserEntity',
            '{',
            "\t".'/** @var MyVendor\WebShop\User\UserLastName */',
            "\t".'private $lastName = \'Smith\';',
            '',
            '',
            '}',
            '',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($definition)->shouldReturn($expected);
    }
}
