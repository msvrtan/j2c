<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\UserAvatarUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\User\UserAvatarUrl
 * @group  todo
 */
class UserAvatarUrlTest extends TestCase
{
    /** @var string */
    private $avatarUrl;

    /** @var UserAvatarUrl */
    private $sut;


    public function setUp()
    {
        $this->avatarUrl = 'avatarUrl';
        $this->sut = new UserAvatarUrl($this->avatarUrl);
    }


    public function testGetAvatarUrl()
    {
        self::assertSame($this->avatarUrl, $this->sut->getAvatarUrl());
    }


    public function testToString()
    {
        self::assertSame($this->avatarUrl, $this->sut->__toString());
    }


    public function testSerialize()
    {
        self::assertEquals($this->avatarUrl, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->avatarUrl));
    }
}