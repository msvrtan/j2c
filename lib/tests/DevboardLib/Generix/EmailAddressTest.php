<?php

declare(strict_types=1);

namespace Tests\DevboardLib\Generix;

use DevboardLib\Generix\EmailAddress;
use PHPUnit\Framework\TestCase;

class EmailAddressTest extends TestCase
{
    /** @var string */
    private $email;

    /** @var EmailAddress */
    private $sut;


    public function setUp()
    {
        $this->email = 'email';
        $this->sut = new EmailAddress($this->email);
    }


    public function testGetEmail()
    {
        self::assertSame($this->email, $this->sut->getEmail());
    }


    public function testGetValue()
    {
        self::assertSame($this->email, $this->sut->getValue());
    }


    public function testToString()
    {
        self::assertSame($this->email, $this->sut->__toString());
    }


    public function testSerialize()
    {
        self::assertEquals($this->email, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->email));
    }
}
