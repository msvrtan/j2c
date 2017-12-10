<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\Php\Structure;

use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\Php\Structure\MethodParameter;
use NullDevelopment\Skeleton\Php\Structure\Variable;
use PhpSpec\ObjectBehavior;

class MethodParameterSpec extends ObjectBehavior
{
    public function let(ClassName $className)
    {
        $this->beConstructedWith($name = 'param', $className, $nullable = false, $hasDefaultValue = false, $defaultValue = null);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(MethodParameter::class);
        $this->shouldImplement(Variable::class);
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('param');
    }

    public function it_exposes_class_name(ClassName $className)
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
