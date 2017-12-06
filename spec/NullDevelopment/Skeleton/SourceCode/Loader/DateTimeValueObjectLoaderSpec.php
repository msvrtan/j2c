<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\Loader;

use NullDevelopment\Skeleton\Core\ConfigurationLoader;
use NullDevelopment\Skeleton\Core\Loader\InterfaceLoader;
use NullDevelopment\Skeleton\Core\Loader\TraitLoader;
use NullDevelopment\Skeleton\SourceCode\Definition\DateTimeValueObject;
use NullDevelopment\Skeleton\SourceCode\Loader\DateTimeValueObjectLoader;
use PhpSpec\ObjectBehavior;

class DateTimeValueObjectLoaderSpec extends ObjectBehavior
{
    public function let(InterfaceLoader $interfaceLoader, TraitLoader $traitLoader)
    {
        $this->beConstructedWith($interfaceLoader, $traitLoader);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DateTimeValueObjectLoader::class);
        $this->shouldImplement(ConfigurationLoader::class);
    }

    public function it_will_return_object_from_given_configuration(
        InterfaceLoader $interfaceLoader,
        TraitLoader $traitLoader
    ) {
        $input = [
            'type'       => 'DateTimeValueObject',
            'className'  => 'MyVendor\\User\\UserId',
            'parent'     => null,
            'interfaces' => [],
            'traits'     => [],
        ];

        $interfaceLoader->load([])->shouldBeCalled()->willReturn([]);
        $traitLoader->load([])->shouldBeCalled()->willReturn([]);

        $this->load($input)
            ->shouldReturnAnInstanceOf(DateTimeValueObject::class);
    }
}
