<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\Definition;

use NullDevelopment\Skeleton\Core\PhpSpec\Definition\PhpSpecSpecification;
use NullDevelopment\Skeleton\Php\ClassDefinition;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\PhpSpec\Definition\DateTimeValueObjectSpec;
use PhpSpec\ObjectBehavior;

class DateTimeValueObjectSpecSpec extends ObjectBehavior
{
    public function let(ClassName $name)
    {
        $this->beConstructedWith($name, null, [], [], null, []);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DateTimeValueObjectSpec::class);
        $this->shouldHaveType(ClassDefinition::class);
        $this->shouldImplement(PhpSpecSpecification::class);
    }
}
