<?php

declare(strict_types=1);

namespace Tests\MyVendor;

use DateTime;
use MyVendor\UserEntity;
use MyVendor\User\UserCreatedAt;
use MyVendor\User\UserId;
use MyVendor\User\Username;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyVendor\UserEntity
 * @group  todo
 */
class UserEntityTest extends TestCase
{
    /** @var UserId */
    private $id;

    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /** @var Username */
    private $username;

    /** @var UserCreatedAt */
    private $createdAt;

    /** @var DateTime */
    private $updatedAt;

    /** @var UserEntity */
    private $sut;


    public function setUp()
    {
        $this->id = new UserId(1);
        $this->firstName = 'firstName';
        $this->lastName = 'lastName';
        $this->username = new Username('username');
        $this->createdAt = new UserCreatedAt('2018-02-03 12:23:34');
        $this->updatedAt = new DateTime('2018-03-04 14:15:16');
        $this->sut = new UserEntity($this->id, $this->firstName, $this->lastName, $this->username, $this->createdAt, $this->updatedAt);
    }


    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }


    public function testGetFirstName()
    {
        self::assertSame($this->firstName, $this->sut->getFirstName());
    }


    public function testGetLastName()
    {
        self::assertSame($this->lastName, $this->sut->getLastName());
    }


    public function testGetUsername()
    {
        self::assertSame($this->username, $this->sut->getUsername());
    }


    public function testGetCreatedAt()
    {
        self::assertSame($this->createdAt, $this->sut->getCreatedAt());
    }


    public function testGetUpdatedAt()
    {
        self::assertSame($this->updatedAt, $this->sut->getUpdatedAt());
    }


    public function testSerializeAndDeserialize()
    {
        $serialized = $this->sut->serialize();
        self::assertEquals($this->sut, UserEntity::deserialize($serialized));
    }
}
