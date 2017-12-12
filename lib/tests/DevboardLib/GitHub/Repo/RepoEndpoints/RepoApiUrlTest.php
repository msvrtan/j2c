<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo\RepoEndpoints;

use DevboardLib\GitHub\Repo\RepoEndpoints\RepoApiUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoEndpoints\RepoApiUrl
 * @group  todo
 */
class RepoApiUrlTest extends TestCase
{
    /** @var string */
    private $url;

    /** @var RepoApiUrl */
    private $sut;


    public function setUp()
    {
        $this->url = 'url';
        $this->sut = new RepoApiUrl($this->url);
    }


    public function testGetUrl()
    {
        self::assertSame($this->url, $this->sut->getUrl());
    }


    public function testToString()
    {
        self::assertSame($this->url, $this->sut->__toString());
    }


    public function testSerialize()
    {
        self::assertEquals($this->url, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->url));
    }
}
