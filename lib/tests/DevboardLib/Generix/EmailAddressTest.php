<?php

declare(strict_types=1);

namespace Tests\DevboardLib\Generix;

use DevboardLib\Generix\EmailAddress;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\Generix\EmailAddress
 * @group  todo
 */
class EmailAddressTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var EmailAddress */
    private $sut;


    public function setUp()
    {
        $this->value = 'value';
        $this->sut = new EmailAddress($this->value);
    }


    public function testGetValue()
    {
        self::assertSame($this->value, $this->sut->getValue());
    }


    public function testToString()
    {
        self::assertSame($this->value, $this->sut->__toString());
    }


    public function testSerialize()
    {
        self::assertEquals($this->value, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->value));
    }
}
