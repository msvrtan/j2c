<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks;

use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\RequiredStatusChecksEnforcementLevel;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RequiredStatusChecksEnforcementLevelSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($enforcementLevel = 'enforcementLevel');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(RequiredStatusChecksEnforcementLevel::class);
    }


    public function it_exposes_enforcementLevel()
    {
        $this->getEnforcementLevel()->shouldReturn('enforcementLevel');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('enforcementLevel');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('enforcementLevel');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('enforcementLevel')->shouldReturnAnInstanceOf(RequiredStatusChecksEnforcementLevel::class);
    }
}
