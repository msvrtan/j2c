<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\Definition;

use NullDevelopment\Skeleton\Core\PhpSpec\Definition\PhpSpecSpecification;
use NullDevelopment\Skeleton\Php\ClassDefinition;
use NullDevelopment\Skeleton\Php\Method\ConstructorMethod;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\PhpSpec\Definition\SimpleValueObjectSpec;
use PhpSpec\ObjectBehavior;

class SimpleValueObjectSpecSpec extends ObjectBehavior
{
    public function let(ClassName $name, ConstructorMethod $constructorMethod)
    {
        $this->beConstructedWith($name, null, [], [], $constructorMethod, []);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleValueObjectSpec::class);
        $this->shouldHaveType(ClassDefinition::class);
        $this->shouldImplement(PhpSpecSpecification::class);
    }
}
