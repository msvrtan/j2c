<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoApiUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoGitUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoHtmlUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoSshUrl;
use PHPUnit\Framework\TestCase;

class RepoEndpointsTest extends TestCase
{
    /** @var RepoHtmlUrl */
    private $htmlUrl;

    /** @var RepoApiUrl */
    private $url;

    /** @var RepoGitUrl */
    private $gitUrl;

    /** @var RepoSshUrl */
    private $sshUrl;

    /** @var RepoEndpoints */
    private $sut;


    public function setUp()
    {
        $this->htmlUrl = new RepoHtmlUrl('htmlUrl');
        $this->url = new RepoApiUrl('url');
        $this->gitUrl = new RepoGitUrl('gitUrl');
        $this->sshUrl = new RepoSshUrl('sshUrl');
        $this->sut = new RepoEndpoints($this->htmlUrl, $this->url, $this->gitUrl, $this->sshUrl);
    }


    public function testGetHtmlUrl()
    {
        self::assertSame($this->htmlUrl, $this->sut->getHtmlUrl());
    }


    public function testGetUrl()
    {
        self::assertSame($this->url, $this->sut->getUrl());
    }


    public function testGetGitUrl()
    {
        self::assertSame($this->gitUrl, $this->sut->getGitUrl());
    }


    public function testGetSshUrl()
    {
        self::assertSame($this->sshUrl, $this->sut->getSshUrl());
    }


    public function testSerialize()
    {
        $expected = [
            'htmlUrl'=> 'htmlUrl',
            'url'=> 'url',
            'gitUrl'=> 'gitUrl',
            'sshUrl'=> 'sshUrl'
        ];

        self::assertSame($expected, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, RepoEndpoints::deserialize(json_decode($serialized,true)));
    }
}
