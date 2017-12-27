<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoId;
use PHPUnit\Framework\TestCase;

class RepoIdTest extends TestCase
{
    /** @var int */
    private $id;

    /** @var RepoId */
    private $sut;


    public function setUp()
    {
        $this->id = 1;
        $this->sut = new RepoId($this->id);
    }


    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }


    public function testToString()
    {
        self::assertSame((string) $this->id, $this->sut->__toString());
    }


    public function testSerialize()
    {
        self::assertEquals($this->id, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->id));
    }
}
