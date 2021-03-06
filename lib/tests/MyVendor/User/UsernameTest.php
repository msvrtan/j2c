<?php

declare(strict_types=1);

namespace Tests\MyVendor\User;

use MyVendor\User\Username;
use PHPUnit\Framework\TestCase;

class UsernameTest extends TestCase
{
    /** @var string */
    private $username;

    /** @var Username */
    private $sut;


    public function setUp()
    {
        $this->username = 'username';
        $this->sut = new Username($this->username);
    }


    public function testGetUsername()
    {
        self::assertSame($this->username, $this->sut->getUsername());
    }


    public function testGetValue()
    {
        self::assertSame($this->username, $this->sut->getValue());
    }


    public function testToString()
    {
        self::assertSame($this->username, $this->sut->__toString());
    }


    public function testSerialize()
    {
        self::assertEquals($this->username, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->username));
    }
}
