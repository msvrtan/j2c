<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo\RepoEndpoints;

use DevboardLib\GitHub\Repo\RepoEndpoints\RepoGitUrl;
use PHPUnit\Framework\TestCase;

class RepoGitUrlTest extends TestCase
{
    /** @var string */
    private $gitUrl;

    /** @var RepoGitUrl */
    private $sut;


    public function setUp()
    {
        $this->gitUrl = 'gitUrl';
        $this->sut = new RepoGitUrl($this->gitUrl);
    }


    public function testGetGitUrl()
    {
        self::assertSame($this->gitUrl, $this->sut->getGitUrl());
    }


    public function testGetValue()
    {
        self::assertSame($this->gitUrl, $this->sut->getValue());
    }


    public function testToString()
    {
        self::assertSame($this->gitUrl, $this->sut->__toString());
    }


    public function testSerialize()
    {
        self::assertEquals($this->gitUrl, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->gitUrl));
    }
}
