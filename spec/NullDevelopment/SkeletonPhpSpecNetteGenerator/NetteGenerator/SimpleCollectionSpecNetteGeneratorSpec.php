<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteGenerator;

use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteGenerator\SimpleCollectionSpecNetteGenerator;
use PhpSpec\ObjectBehavior;

class SimpleCollectionSpecNetteGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleCollectionSpecNetteGenerator::class);
    }
}
