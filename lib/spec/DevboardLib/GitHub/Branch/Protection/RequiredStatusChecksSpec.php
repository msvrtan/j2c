<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Branch\Protection;

use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Contexts;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\RequiredStatusChecksEnforcementLevel;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

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


    public function it_exposes_enforcementLevel(RequiredStatusChecksEnforcementLevel $enforcementLevel)
    {
        $this->getEnforcementLevel()->shouldReturn($enforcementLevel);
    }


    public function it_exposes_contexts(Contexts $contexts)
    {
        $this->getContexts()->shouldReturn($contexts);
    }


    public function it_is_serializable(RequiredStatusChecksEnforcementLevel $enforcementLevel, Contexts $contexts)
    {
        $enforcementLevel->serialize()->shouldBeCalled()->willReturn('enforcementLevel');
        $contexts->serialize()->shouldBeCalled()->willReturn(['data']);
        $this->serialize()->shouldReturn(['enforcementLevel' => 'enforcementLevel', 'contexts' => ['data']]);
    }


    public function it_is_deserializable()
    {
        $this->deserialize(['enforcementLevel' => 'enforcementLevel', 'contexts' => ['data']])->shouldReturnAnInstanceOf(RequiredStatusChecks::class);
    }
}
