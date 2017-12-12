<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Branch;

use DevboardLib\GitHub\Branch\Protection;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProtectionSpec extends ObjectBehavior
{
    public function let(RequiredStatusChecks $requiredStatusChecks)
    {
        $this->beConstructedWith($enabled = true, $requiredStatusChecks);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(Protection::class);
    }


    public function it_exposes_enabled()
    {
        $this->getEnabled()->shouldReturn(true);
    }


    public function it_exposes_requiredStatusChecks(RequiredStatusChecks $requiredStatusChecks)
    {
        $this->getRequiredStatusChecks()->shouldReturn($requiredStatusChecks);
    }


    public function it_is_serializable(RequiredStatusChecks $requiredStatusChecks)
    {
        $requiredStatusChecks->serialize()->shouldBeCalled()->willReturn(['requiredStatusChecks', ['data']]);
        $this->serialize()->shouldReturn(['enabled' => true, 'requiredStatusChecks' => ['requiredStatusChecks', ['data']]]);
    }


    public function it_is_deserializable()
    {
        $this->deserialize(['enabled' => true, 'requiredStatusChecks' => ['requiredStatusChecks', ['data']]])->shouldReturnAnInstanceOf(Protection::class);
    }
}
