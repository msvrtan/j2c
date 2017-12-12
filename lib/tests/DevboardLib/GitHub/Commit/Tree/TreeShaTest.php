<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit\Tree;

use DevboardLib\GitHub\Commit\Tree\TreeSha;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\Tree\TreeSha
 * @group  todo
 */
class TreeShaTest extends TestCase
{
    /** @var string */
    private $sha;

    /** @var TreeSha */
    private $sut;


    public function setUp()
    {
        $this->sha = 'sha';
        $this->sut = new TreeSha($this->sha);
    }


    public function testGetSha()
    {
        self::assertSame($this->sha, $this->sut->getSha());
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
