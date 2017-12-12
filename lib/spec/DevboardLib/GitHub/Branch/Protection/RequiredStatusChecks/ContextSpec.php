<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks;

use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context;
use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context\ContextId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ContextSpec extends ObjectBehavior
{
    public function let(ContextId $id)
    {
        $this->beConstructedWith($id);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(Context::class);
    }


    public function it_exposes_id(ContextId $id)
    {
        $this->getId()->shouldReturn($id);
    }


    public function it_is_serializable(ContextId $id)
    {
        $id->serialize()->shouldBeCalled()->willReturn(1);
        $this->serialize()->shouldReturn(1);
    }


    public function it_is_deserializable()
    {
        $this->deserialize(1)->shouldReturnAnInstanceOf(Context::class);
    }
}
