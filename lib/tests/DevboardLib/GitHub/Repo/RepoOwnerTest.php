<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Repo\RepoOwner;
use PHPUnit\Framework\TestCase;

class RepoOwnerTest extends TestCase
{
    /** @var AccountId */
    private $id;

    /** @var AccountLogin */
    private $login;

    /** @var AccountType */
    private $type;

    /** @var AccountAvatarUrl */
    private $avatarUrl;

    /** @var GravatarId */
    private $gravatarId;

    /** @var AccountHtmlUrl */
    private $htmlUrl;

    /** @var AccountApiUrl */
    private $url;

    /** @var bool */
    private $siteAdmin;

    /** @var RepoOwner */
    private $sut;


    public function setUp()
    {
        $this->id = new AccountId(1);
        $this->login = new AccountLogin('login');
        $this->type = new AccountType('type');
        $this->avatarUrl = new AccountAvatarUrl('avatarUrl');
        $this->gravatarId = new GravatarId('gravatarId');
        $this->htmlUrl = new AccountHtmlUrl('htmlUrl');
        $this->url = new AccountApiUrl('url');
        $this->siteAdmin = true;
        $this->sut = new RepoOwner($this->id, $this->login, $this->type, $this->avatarUrl, $this->gravatarId, $this->htmlUrl, $this->url, $this->siteAdmin);
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


    public function testGetUrl()
    {
        self::assertSame($this->url, $this->sut->getUrl());
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
            'url'=> 'url',
            'siteAdmin'=> true
        ];

        self::assertSame($expected, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, RepoOwner::deserialize(json_decode($serialized,true)));
    }
}
