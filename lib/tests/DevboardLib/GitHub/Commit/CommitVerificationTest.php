<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitVerification;
use DevboardLib\GitHub\Commit\Verification\VerificationPayload;
use DevboardLib\GitHub\Commit\Verification\VerificationReason;
use DevboardLib\GitHub\Commit\Verification\VerificationSignature;
use DevboardLib\GitHub\Commit\Verification\VerificationVerified;
use PHPUnit\Framework\TestCase;

class CommitVerificationTest extends TestCase
{
    /** @var VerificationVerified */
    private $verified;

    /** @var VerificationReason */
    private $reason;

    /** @var VerificationSignature|null */
    private $signature;

    /** @var VerificationPayload|null */
    private $payload;

    /** @var CommitVerification */
    private $sut;


    public function setUp()
    {
        $this->verified = new VerificationVerified(true);
        $this->reason = new VerificationReason('reason');
        $this->signature = new VerificationSignature('signature');
        $this->payload = new VerificationPayload('payload');
        $this->sut = new CommitVerification($this->verified, $this->reason, $this->signature, $this->payload);
    }


    public function testGetVerified()
    {
        self::assertSame($this->verified, $this->sut->getVerified());
    }


    public function testGetReason()
    {
        self::assertSame($this->reason, $this->sut->getReason());
    }


    public function testGetSignature()
    {
        self::assertSame($this->signature, $this->sut->getSignature());
    }


    public function testGetPayload()
    {
        self::assertSame($this->payload, $this->sut->getPayload());
    }


    public function testSerialize()
    {
        $expected = [
            'verified'=> true,
            'reason'=> 'reason',
            'signature'=> 'signature',
            'payload'=> 'payload'
        ];

        self::assertSame($expected, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, CommitVerification::deserialize(json_decode($serialized,true)));
    }
}
