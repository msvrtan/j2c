<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitTree;
use DevboardLib\GitHub\Commit\Tree\TreeSha;
use DevboardLib\GitHub\Commit\Tree\TreeUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\CommitTree
 * @group  todo
 */
class CommitTreeTest extends TestCase
{
    /** @var TreeSha */
    private $sha;

    /** @var TreeUrl */
    private $url;

    /** @var CommitTree */
    private $sut;


    public function setUp()
    {
        $this->sha = new TreeSha('sha');
        $this->url = new TreeUrl('url');
        $this->sut = new CommitTree($this->sha, $this->url);
    }


    public function testGetSha()
    {
        self::assertSame($this->sha, $this->sut->getSha());
    }


    public function testGetUrl()
    {
        self::assertSame($this->url, $this->sut->getUrl());
    }


    public function testSerializeAndDeserialize()
    {
        $serialized = $this->sut->serialize();
        self::assertEquals($this->sut, CommitTree::deserialize($serialized));
    }
}
