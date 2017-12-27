<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitSha;
use PHPUnit\Framework\TestCase;

class CommitShaTest extends TestCase
{
    /** @var string */
    private $sha;

    /** @var CommitSha */
    private $sut;


    public function setUp()
    {
        $this->sha = 'sha';
        $this->sut = new CommitSha($this->sha);
    }


    public function testGetSha()
    {
        self::assertSame($this->sha, $this->sut->getSha());
    }


    public function testGetValue()
    {
        self::assertSame($this->sha, $this->sut->getValue());
    }


    public function testToString()
    {
        self::assertSame($this->sha, $this->sut->__toString());
    }


    public function testSerialize()
    {
        self::assertEquals($this->sha, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->sha));
    }
}
