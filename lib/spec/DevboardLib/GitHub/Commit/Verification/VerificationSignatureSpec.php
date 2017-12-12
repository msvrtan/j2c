<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit\Verification;

use DevboardLib\GitHub\Commit\Verification\VerificationSignature;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class VerificationSignatureSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($signature = 'signature');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(VerificationSignature::class);
    }


    public function it_exposes_signature()
    {
        $this->getSignature()->shouldReturn('signature');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('signature');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('signature');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('signature')->shouldReturnAnInstanceOf(VerificationSignature::class);
    }
}
