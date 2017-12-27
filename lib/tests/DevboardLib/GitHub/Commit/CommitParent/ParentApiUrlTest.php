<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit\CommitParent;

use DevboardLib\GitHub\Commit\CommitParent\ParentApiUrl;
use PHPUnit\Framework\TestCase;

class ParentApiUrlTest extends TestCase
{
    /** @var string */
    private $apiUrl;

    /** @var ParentApiUrl */
    private $sut;


    public function setUp()
    {
        $this->apiUrl = 'apiUrl';
        $this->sut = new ParentApiUrl($this->apiUrl);
    }


    public function testGetApiUrl()
    {
        self::assertSame($this->apiUrl, $this->sut->getApiUrl());
    }


    public function testGetValue()
    {
        self::assertSame($this->apiUrl, $this->sut->getValue());
    }


    public function testToString()
    {
        self::assertSame($this->apiUrl, $this->sut->__toString());
    }


    public function testSerialize()
    {
        self::assertEquals($this->apiUrl, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->apiUrl));
    }
}
