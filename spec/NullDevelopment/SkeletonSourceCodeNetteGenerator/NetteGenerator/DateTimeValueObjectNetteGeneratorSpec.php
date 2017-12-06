<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteGenerator;

use NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteGenerator\DateTimeValueObjectNetteGenerator;
use PhpSpec\ObjectBehavior;

class DateTimeValueObjectNetteGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DateTimeValueObjectNetteGenerator::class);
    }
}
