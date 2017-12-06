<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\Definition;

use NullDevelopment\Skeleton\Core\PhpUnit\Definition\PhpUnitTest;
use NullDevelopment\Skeleton\Php\ClassDefinition;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\PhpUnit\Definition\DateTimeValueObjectTest;
use PhpSpec\ObjectBehavior;

class DateTimeValueObjectTestSpec extends ObjectBehavior
{
    public function let(ClassName $name)
    {
        $this->beConstructedWith($name, null, [], [], null, []);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DateTimeValueObjectTest::class);
        $this->shouldHaveType(ClassDefinition::class);
        $this->shouldImplement(PhpUnitTest::class);
    }
}
