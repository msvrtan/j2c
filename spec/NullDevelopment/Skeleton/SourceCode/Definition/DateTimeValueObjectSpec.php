<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\Definition;

use NullDevelopment\Skeleton\Core\SourceCode\Definition\SourceCode;
use NullDevelopment\Skeleton\Php\ClassDefinition;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\DateTimeValueObject;
use PhpSpec\ObjectBehavior;

class DateTimeValueObjectSpec extends ObjectBehavior
{
    public function let(ClassName $name)
    {
        $this->beConstructedWith($name, null, [], [], null, []);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DateTimeValueObject::class);
        $this->shouldHaveType(ClassDefinition::class);
        $this->shouldImplement(SourceCode::class);
    }
}
