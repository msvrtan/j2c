<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoCreatedAt;
use DevboardLib\GitHub\Repo\RepoPushedAt;
use DevboardLib\GitHub\Repo\RepoTimestamps;
use DevboardLib\GitHub\Repo\RepoUpdatedAt;
use PHPUnit\Framework\TestCase;

class RepoTimestampsTest extends TestCase
{
    /** @var RepoCreatedAt */
    private $createdAt;

    /** @var RepoUpdatedAt */
    private $updatedAt;

    /** @var RepoPushedAt */
    private $pushedAt;

    /** @var RepoTimestamps */
    private $sut;


    public function setUp()
    {
        $this->createdAt = new RepoCreatedAt('2018-01-01T00:01:00+00:00');
        $this->updatedAt = new RepoUpdatedAt('2018-01-01T00:01:00+00:00');
        $this->pushedAt = new RepoPushedAt('2018-01-01T00:01:00+00:00');
        $this->sut = new RepoTimestamps($this->createdAt, $this->updatedAt, $this->pushedAt);
    }


    public function testGetCreatedAt()
    {
        self::assertSame($this->createdAt, $this->sut->getCreatedAt());
    }


    public function testGetUpdatedAt()
    {
        self::assertSame($this->updatedAt, $this->sut->getUpdatedAt());
    }


    public function testGetPushedAt()
    {
        self::assertSame($this->pushedAt, $this->sut->getPushedAt());
    }


    public function testSerialize()
    {
        $expected = [
            'createdAt'=> '2018-01-01T00:01:00+00:00',
            'updatedAt'=> '2018-01-01T00:01:00+00:00',
            'pushedAt'=> '2018-01-01T00:01:00+00:00'
        ];

        self::assertSame($expected, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, RepoTimestamps::deserialize(json_decode($serialized,true)));
    }
}
