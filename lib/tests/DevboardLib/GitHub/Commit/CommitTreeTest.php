<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitTree;
use DevboardLib\GitHub\Commit\Tree\TreeSha;
use DevboardLib\GitHub\Commit\Tree\TreeUrl;
use PHPUnit\Framework\TestCase;

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


    public function testGetId()
    {
        self::assertSame($this->url, $this->sut->getId());
    }


    public function testGetUrl()
    {
        self::assertSame($this->url, $this->sut->getUrl());
    }


    public function testSerialize()
    {
        $expected = [
            'sha'=> 'sha',
            'url'=> 'url'
        ];

        self::assertSame($expected, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, CommitTree::deserialize(json_decode($serialized,true)));
    }
}
