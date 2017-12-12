<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit\Verification;

use DevboardLib\GitHub\Commit\Verification\VerificationVerified;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class VerificationVerifiedSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($verified = true);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(VerificationVerified::class);
    }


    public function it_exposes_verified()
    {
        $this->getVerified()->shouldReturn(true);
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn(true);
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn(true);
    }


    public function it_is_deserializable()
    {
        $this->deserialize(true)->shouldReturnAnInstanceOf(VerificationVerified::class);
    }
}
