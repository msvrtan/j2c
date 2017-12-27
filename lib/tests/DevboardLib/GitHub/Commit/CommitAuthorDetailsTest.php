<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Commit\CommitAuthorDetails;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;
use PHPUnit\Framework\TestCase;

class CommitAuthorDetailsTest extends TestCase
{
    /** @var UserId */
    private $id;

    /** @var UserLogin */
    private $login;

    /** @var AccountType */
    private $type;

    /** @var UserAvatarUrl */
    private $avatarUrl;

    /** @var GravatarId */
    private $gravatarId;

    /** @var UserHtmlUrl */
    private $htmlUrl;

    /** @var UserApiUrl */
    private $apiUrl;

    /** @var bool */
    private $siteAdmin;

    /** @var CommitAuthorDetails */
    private $sut;


    public function setUp()
    {
        $this->id = new UserId(1);
        $this->login = new UserLogin('login');
        $this->type = new AccountType('type');
        $this->avatarUrl = new UserAvatarUrl('avatarUrl');
        $this->gravatarId = new GravatarId('gravatarId');
        $this->htmlUrl = new UserHtmlUrl('htmlUrl');
        $this->apiUrl = new UserApiUrl('apiUrl');
        $this->siteAdmin = true;
        $this->sut = new CommitAuthorDetails($this->id, $this->login, $this->type, $this->avatarUrl, $this->gravatarId, $this->htmlUrl, $this->apiUrl, $this->siteAdmin);
    }


    public function testGetId()
    {
        self::assertSame($this->siteAdmin, $this->sut->getId());
    }


    public function testGetLogin()
    {
        self::assertSame($this->login, $this->sut->getLogin());
    }


    public function testGetType()
    {
        self::assertSame($this->type, $this->sut->getType());
    }


    public function testGetAvatarUrl()
    {
        self::assertSame($this->avatarUrl, $this->sut->getAvatarUrl());
    }


    public function testGetGravatarId()
    {
        self::assertSame($this->gravatarId, $this->sut->getGravatarId());
    }


    public function testGetHtmlUrl()
    {
        self::assertSame($this->htmlUrl, $this->sut->getHtmlUrl());
    }


    public function testGetApiUrl()
    {
        self::assertSame($this->apiUrl, $this->sut->getApiUrl());
    }


    public function testGetSiteAdmin()
    {
        self::assertSame($this->siteAdmin, $this->sut->getSiteAdmin());
    }


    public function testSerialize()
    {
        $expected = [
            'id'=> 1,
            'login'=> 'login',
            'type'=> 'type',
            'avatarUrl'=> 'avatarUrl',
            'gravatarId'=> 'gravatarId',
            'htmlUrl'=> 'htmlUrl',
            'apiUrl'=> 'apiUrl',
            'siteAdmin'=> true
        ];

        self::assertSame($expected, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        $serialized = $this->sut->serialize();
        self::assertEquals($this->sut, CommitAuthorDetails::deserialize($serialized));
    }
}
