<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit\Verification;

use DevboardLib\GitHub\Commit\Verification\VerificationPayload;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class VerificationPayloadSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($payload = 'payload');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(VerificationPayload::class);
    }


    public function it_exposes_payload()
    {
        $this->getPayload()->shouldReturn('payload');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('payload');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('payload');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('payload')->shouldReturnAnInstanceOf(VerificationPayload::class);
    }
}
