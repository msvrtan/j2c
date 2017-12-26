<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit\Verification;

use DevboardLib\GitHub\Commit\Verification\VerificationPayload;
use PhpSpec\ObjectBehavior;

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


    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('payload');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('payload');
    }


    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('payload');
    }


    public function it_can_be_deserialized()
    {
        $this->deserialize('payload')->shouldReturnAnInstanceOf(VerificationPayload::class);
    }
}
