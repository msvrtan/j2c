<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteGenerator;

use Miro\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteGenerator\SimpleCollectionTestNetteGenerator;
use PhpSpec\ObjectBehavior;

class SimpleCollectionTestNetteGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleCollectionTestNetteGenerator::class);
    }
}
