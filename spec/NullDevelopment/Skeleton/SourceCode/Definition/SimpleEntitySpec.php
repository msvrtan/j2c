<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\Definition;

use NullDevelopment\Skeleton\Core\SourceCode\Definition\SourceCode;
use NullDevelopment\Skeleton\Php\ClassDefinition;
use NullDevelopment\Skeleton\Php\Method\ConstructorMethod;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleEntity;
use PhpSpec\ObjectBehavior;

class SimpleEntitySpec extends ObjectBehavior
{
    public function let(ClassName $name, ConstructorMethod $constructorMethod)
    {
        $this->beConstructedWith($name, null, [], [], $constructorMethod, []);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleEntity::class);
        $this->shouldHaveType(ClassDefinition::class);
        $this->shouldImplement(SourceCode::class);
    }
}
