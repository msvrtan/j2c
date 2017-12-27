<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitParent;
use DevboardLib\GitHub\Commit\CommitParent\ParentApiUrl;
use DevboardLib\GitHub\Commit\CommitParent\ParentHtmlUrl;
use DevboardLib\GitHub\Commit\CommitSha;
use PHPUnit\Framework\TestCase;

class CommitParentTest extends TestCase
{
    /** @var CommitSha */
    private $sha;

    /** @var ParentApiUrl */
    private $apiUrl;

    /** @var ParentHtmlUrl */
    private $htmlUrl;

    /** @var CommitParent */
    private $sut;


    public function setUp()
    {
        $this->sha = new CommitSha('sha');
        $this->apiUrl = new ParentApiUrl('apiUrl');
        $this->htmlUrl = new ParentHtmlUrl('htmlUrl');
        $this->sut = new CommitParent($this->sha, $this->apiUrl, $this->htmlUrl);
    }


    public function testGetSha()
    {
        self::assertSame($this->sha, $this->sut->getSha());
    }


    public function testGetId()
    {
        self::assertSame($this->htmlUrl, $this->sut->getId());
    }


    public function testGetApiUrl()
    {
        self::assertSame($this->apiUrl, $this->sut->getApiUrl());
    }


    public function testGetHtmlUrl()
    {
        self::assertSame($this->htmlUrl, $this->sut->getHtmlUrl());
    }


    public function testSerialize()
    {
        $expected = [
            'sha'=> 'sha',
            'apiUrl'=> 'apiUrl',
            'htmlUrl'=> 'htmlUrl'
        ];

        self::assertSame($expected, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        $serialized = $this->sut->serialize();
        self::assertEquals($this->sut, CommitParent::deserialize($serialized));
    }
}
