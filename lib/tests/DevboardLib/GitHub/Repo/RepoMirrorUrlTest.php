<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoMirrorUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoMirrorUrl
 * @group  todo
 */
class RepoMirrorUrlTest extends TestCase
{
    /** @var string */
    private $mirrorUrl;

    /** @var RepoMirrorUrl */
    private $sut;


    public function setUp()
    {
        $this->mirrorUrl = 'mirrorUrl';
        $this->sut = new RepoMirrorUrl($this->mirrorUrl);
    }


    public function testGetMirrorUrl()
    {
        self::assertSame($this->mirrorUrl, $this->sut->getMirrorUrl());
    }


    public function testToString()
    {
        self::assertSame($this->mirrorUrl, $this->sut->__toString());
    }


    public function testSerialize()
    {
        self::assertEquals($this->mirrorUrl, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->mirrorUrl));
    }
}
