<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitVerification;
use DevboardLib\GitHub\Commit\Verification\VerificationPayload;
use DevboardLib\GitHub\Commit\Verification\VerificationReason;
use DevboardLib\GitHub\Commit\Verification\VerificationSignature;
use DevboardLib\GitHub\Commit\Verification\VerificationVerified;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommitVerificationSpec extends ObjectBehavior
{
    public function let(VerificationVerified $verified, VerificationReason $reason, VerificationSignature $signature, VerificationPayload $payload)
    {
        $this->beConstructedWith($verified, $reason, $signature, $payload);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitVerification::class);
    }


    public function it_exposes_verified(VerificationVerified $verified)
    {
        $this->getVerified()->shouldReturn($verified);
    }


    public function it_exposes_reason(VerificationReason $reason)
    {
        $this->getReason()->shouldReturn($reason);
    }


    public function it_exposes_signature(VerificationSignature $signature)
    {
        $this->getSignature()->shouldReturn($signature);
    }


    public function it_exposes_payload(VerificationPayload $payload)
    {
        $this->getPayload()->shouldReturn($payload);
    }


    public function it_is_serializable(VerificationVerified $verified, VerificationReason $reason, VerificationSignature $signature, VerificationPayload $payload)
    {
        $verified->serialize()->shouldBeCalled()->willReturn(true);
        $reason->serialize()->shouldBeCalled()->willReturn('reason');
        $signature->serialize()->shouldBeCalled()->willReturn('signature');
        $payload->serialize()->shouldBeCalled()->willReturn('payload');
        $this->serialize()->shouldReturn(['verified' => true, 'reason' => 'reason', 'signature' => 'signature', 'payload' => 'payload']);
    }


    public function it_is_deserializable()
    {
        $this->deserialize(['verified' => true, 'reason' => 'reason', 'signature' => 'signature', 'payload' => 'payload'])->shouldReturnAnInstanceOf(CommitVerification::class);
    }
}
