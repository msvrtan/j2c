<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\Php\Structure;

use NullDevelopment\Skeleton\Php\Structure\ClassName;
use PhpSpec\ObjectBehavior;

class ClassNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($className = 'Money', $namespace = 'MyMoney');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ClassName::class);
    }

    public function it_will_expose_class_name()
    {
        $this->getName()->shouldReturn('Money');
    }

    public function it_will_expose_namespace()
    {
        $this->getNamespace()->shouldReturn('MyMoney');
    }

    public function it_will_expose_full_class_name()
    {
        $this->getFullName()->shouldReturn('MyMoney\Money');
    }
}
