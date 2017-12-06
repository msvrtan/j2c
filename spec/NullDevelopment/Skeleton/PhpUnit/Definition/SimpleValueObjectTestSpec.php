<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\Definition;

use NullDevelopment\Skeleton\Core\PhpUnit\Definition\PhpUnitTest;
use NullDevelopment\Skeleton\Php\ClassDefinition;
use NullDevelopment\Skeleton\Php\Method\ConstructorMethod;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\PhpUnit\Definition\SimpleValueObjectTest;
use PhpSpec\ObjectBehavior;

class SimpleValueObjectTestSpec extends ObjectBehavior
{
    public function let(ClassName $name, ConstructorMethod $constructorMethod)
    {
        $this->beConstructedWith($name, null, [], [], $constructorMethod, []);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleValueObjectTest::class);
        $this->shouldHaveType(ClassDefinition::class);
        $this->shouldImplement(PhpUnitTest::class);
    }
}
