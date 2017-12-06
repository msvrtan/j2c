<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\Php\Method;

use NullDevelopment\Skeleton\Php\Method\ConstructorMethod;
use NullDevelopment\Skeleton\Php\Structure\MethodParameter;
use PhpSpec\ObjectBehavior;

class ConstructorMethodSpec extends ObjectBehavior
{
    public function let(MethodParameter $parameter1, MethodParameter $parameter2)
    {
        $this->beConstructedWith([$parameter1, $parameter2]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ConstructorMethod::class);
    }
}
