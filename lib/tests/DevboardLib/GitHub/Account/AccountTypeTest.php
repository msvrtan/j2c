<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountType;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Account\AccountType
 * @group  todo
 */
class AccountTypeTest extends TestCase
{
    /** @var string */
    private $type;

    /** @var AccountType */
    private $sut;


    public function setUp()
    {
        $this->type = 'type';
        $this->sut = new AccountType($this->type);
    }


    public function testGetType()
    {
        self::assertSame($this->type, $this->sut->getType());
    }


    public function testToString()
    {
        self::assertSame($this->type, $this->sut->__toString());
    }


    public function testSerialize()
    {
        self::assertEquals($this->type, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->type));
    }
}
