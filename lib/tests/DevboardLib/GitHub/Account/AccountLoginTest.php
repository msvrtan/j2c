<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountLogin;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Account\AccountLogin
 * @group  todo
 */
class AccountLoginTest extends TestCase
{
    /** @var string */
    private $login;

    /** @var AccountLogin */
    private $sut;


    public function setUp()
    {
        $this->login = 'login';
        $this->sut = new AccountLogin($this->login);
    }


    public function testGetLogin()
    {
        self::assertSame($this->login, $this->sut->getLogin());
    }


    public function testToString()
    {
        self::assertSame($this->login, $this->sut->__toString());
    }


    public function testSerialize()
    {
        self::assertEquals($this->login, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->login));
    }
}
