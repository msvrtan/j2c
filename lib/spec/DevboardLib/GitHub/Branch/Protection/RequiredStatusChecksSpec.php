<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Branch\Protection;

use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Contexts;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\RequiredStatusChecksEnforcementLevel;
use PhpSpec\ObjectBehavior;

class RequiredStatusChecksSpec extends ObjectBehavior
{
    public function let(RequiredStatusChecksEnforcementLevel $enforcementLevel, Contexts $contexts)
    {
        $this->beConstructedWith($enforcementLevel, $contexts);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(RequiredStatusChecks::class);
    }


    public function it_exposes_enforcement_level(RequiredStatusChecksEnforcementLevel $enforcementLevel)
    {
        $this->getEnforcementLevel()->shouldReturn($enforcementLevel);
    }


    public function it_exposes_id(Contexts $contexts)
    {
        $this->getId()->shouldReturn($contexts);
    }


    public function it_exposes_contexts(Contexts $contexts)
    {
        $this->getContexts()->shouldReturn($contexts);
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn([1]);
    }


    public function it_can_be_serialized(RequiredStatusChecksEnforcementLevel $enforcementLevel, Contexts $contexts)
    {
        $this->serialize()->shouldReturn(['enforcementLevel' => 'enforcementLevel', 'contexts' => [1]]);
    }


    public function it_can_be_deserialized(RequiredStatusChecksEnforcementLevel $enforcementLevel, Contexts $contexts)
    {
        $this->deserialize(['enforcementLevel' => 'enforcementLevel', 'contexts' => [1]])->shouldReturnAnInstanceOf(RequiredStatusChecks::class);
    }
}
