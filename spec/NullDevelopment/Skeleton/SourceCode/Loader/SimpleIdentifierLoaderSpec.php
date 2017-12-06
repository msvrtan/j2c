<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\Loader;

use NullDevelopment\Skeleton\Core\Loader\ConstructorMethodLoader;
use NullDevelopment\Skeleton\Core\Loader\InterfaceLoader;
use NullDevelopment\Skeleton\Core\Loader\PropertyLoader;
use NullDevelopment\Skeleton\Core\Loader\TraitLoader;
use NullDevelopment\Skeleton\Php\Method\ConstructorMethod;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleIdentifier;
use NullDevelopment\Skeleton\SourceCode\Loader\SimpleIdentifierLoader;
use PhpSpec\ObjectBehavior;

class SimpleIdentifierLoaderSpec extends ObjectBehavior
{
    public function let(
        InterfaceLoader $interfaceLoader,
        TraitLoader $traitLoader,
        ConstructorMethodLoader $constructorMethodLoader,
        PropertyLoader $propertyLoader
    ) {
        $this->beConstructedWith($interfaceLoader, $traitLoader, $constructorMethodLoader, $propertyLoader);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleIdentifierLoader::class);
    }

    public function it_will_return_object_from_given_configuration(
        InterfaceLoader $interfaceLoader,
        TraitLoader $traitLoader,
        ConstructorMethodLoader $constructorMethodLoader,
        PropertyLoader $propertyLoader,
        ConstructorMethod $constructorMethod
    ) {
        $constructorParams = [
            'id' => [
                'className'  => 'integer',
                'nullable'   => false,
                'hasDefault' => false,
                'default'    => null,
            ],
        ];

        $input = [
            'type'        => 'SimpleIdentifier',
            'className'   => 'MyVendor\\User\\UserId',
            'parent'      => null,
            'interfaces'  => [],
            'traits'      => [],
            'constructor' => $constructorParams,
        ];

        $interfaceLoader->load([])->shouldBeCalled()->willReturn([]);
        $traitLoader->load([])->shouldBeCalled()->willReturn([]);
        $constructorMethodLoader->load($constructorParams)->shouldBeCalled()->willReturn($constructorMethod);
        $propertyLoader->load($constructorParams)->shouldBeCalled()->willReturn([]);

        $this->load($input)
            ->shouldReturnAnInstanceOf(SimpleIdentifier::class);
    }
}
