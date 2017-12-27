<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit\Tree;

use DevboardLib\GitHub\Commit\Tree\TreeUrl;
use PHPUnit\Framework\TestCase;

class TreeUrlTest extends TestCase
{
    /** @var string */
    private $url;

    /** @var TreeUrl */
    private $sut;


    public function setUp()
    {
        $this->url = 'url';
        $this->sut = new TreeUrl($this->url);
    }


    public function testGetUrl()
    {
        self::assertSame($this->url, $this->sut->getUrl());
    }


    public function testGetValue()
    {
        self::assertSame($this->url, $this->sut->getValue());
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
