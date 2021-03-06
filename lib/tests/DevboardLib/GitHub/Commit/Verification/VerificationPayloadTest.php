<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit\Verification;

use DevboardLib\GitHub\Commit\Verification\VerificationPayload;
use PHPUnit\Framework\TestCase;

class VerificationPayloadTest extends TestCase
{
    /** @var string */
    private $payload;

    /** @var VerificationPayload */
    private $sut;


    public function setUp()
    {
        $this->payload = 'payload';
        $this->sut = new VerificationPayload($this->payload);
    }


    public function testGetPayload()
    {
        self::assertSame($this->payload, $this->sut->getPayload());
    }


    public function testGetValue()
    {
        self::assertSame($this->payload, $this->sut->getValue());
    }


    public function testToString()
    {
        self::assertSame($this->payload, $this->sut->__toString());
    }


    public function testSerialize()
    {
        self::assertEquals($this->payload, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->payload));
    }
}
