<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\Php\Structure;

use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\Php\Structure\Property;
use NullDevelopment\Skeleton\Php\Structure\StructureName;
use NullDevelopment\Skeleton\Php\Structure\Visibility;
use PhpSpec\ObjectBehavior;

class PropertySpec extends ObjectBehavior
{
    public function let(ClassName $className, Visibility $visibility)
    {
        $this->beConstructedWith(
            $name = 'propertyName',
            $className,
            $nullable = false,
            $hasDefault = false,
            $defaultValue = null,
            $visibility,
            $setter = true,
            $getter = true
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Property::class);
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('propertyName');
    }

    public function it_exposes_class_name(StructureName $className)
    {
        $this->getStructureName()->shouldReturn($className);
    }

    public function it_knows_if_its_nullable()
    {
        $this->isNullable()->shouldReturn(false);
    }

    public function it_knows_if_it_has_a_default_value()
    {
        $this->hasDefaultValue()->shouldReturn(false);
    }

    public function it_exposes_default_value()
    {
        $this->getDefaultValue()->shouldReturn(null);
    }
}
