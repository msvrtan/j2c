<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoStats;
use DevboardLib\GitHub\Repo\RepoStats\RepoSize;
use PHPUnit\Framework\TestCase;

class RepoStatsTest extends TestCase
{
    /** @var int */
    private $networkCount;

    /** @var int */
    private $watchersCount;

    /** @var int */
    private $stargazersCount;

    /** @var int */
    private $subscribersCount;

    /** @var int */
    private $openIssuesCount;

    /** @var RepoSize */
    private $size;

    /** @var RepoStats */
    private $sut;


    public function setUp()
    {
        $this->networkCount = 1;
        $this->watchersCount = 1;
        $this->stargazersCount = 1;
        $this->subscribersCount = 1;
        $this->openIssuesCount = 1;
        $this->size = new RepoSize(1);
        $this->sut = new RepoStats($this->networkCount, $this->watchersCount, $this->stargazersCount, $this->subscribersCount, $this->openIssuesCount, $this->size);
    }


    public function testGetNetworkCount()
    {
        self::assertSame($this->networkCount, $this->sut->getNetworkCount());
    }


    public function testGetId()
    {
        self::assertSame($this->size, $this->sut->getId());
    }


    public function testGetWatchersCount()
    {
        self::assertSame($this->watchersCount, $this->sut->getWatchersCount());
    }


    public function testGetStargazersCount()
    {
        self::assertSame($this->stargazersCount, $this->sut->getStargazersCount());
    }


    public function testGetSubscribersCount()
    {
        self::assertSame($this->subscribersCount, $this->sut->getSubscribersCount());
    }


    public function testGetOpenIssuesCount()
    {
        self::assertSame($this->openIssuesCount, $this->sut->getOpenIssuesCount());
    }


    public function testGetSize()
    {
        self::assertSame($this->size, $this->sut->getSize());
    }


    public function testSerialize()
    {
        $expected = [
            'networkCount'=> 1,
            'watchersCount'=> 1,
            'stargazersCount'=> 1,
            'subscribersCount'=> 1,
            'openIssuesCount'=> 1,
            'size'=> 1
        ];

        self::assertSame($expected, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, RepoStats::deserialize(json_decode($serialized,true)));
    }
}
