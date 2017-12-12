<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit\Verification;

use DevboardLib\GitHub\Commit\Verification\VerificationReason;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class VerificationReasonSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($reason = 'reason');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(VerificationReason::class);
    }


    public function it_exposes_reason()
    {
        $this->getReason()->shouldReturn('reason');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('reason');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('reason');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('reason')->shouldReturnAnInstanceOf(VerificationReason::class);
    }
}
