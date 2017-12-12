<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitApiUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\CommitApiUrl
 * @group  todo
 */
class CommitApiUrlTest extends TestCase
{
    /** @var string */
    private $apiUrl;

    /** @var CommitApiUrl */
    private $sut;


    public function setUp()
    {
        $this->apiUrl = 'apiUrl';
        $this->sut = new CommitApiUrl($this->apiUrl);
    }


    public function testGetApiUrl()
    {
        self::assertSame($this->apiUrl, $this->sut->getApiUrl());
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
