<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo\RepoStats;

use DevboardLib\GitHub\Repo\RepoStats\RepoSize;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoStats\RepoSize
 * @group  todo
 */
class RepoSizeTest extends TestCase
{
    /** @var int */
    private $size;

    /** @var RepoSize */
    private $sut;


    public function setUp()
    {
        $this->size = 1;
        $this->sut = new RepoSize($this->size);
    }


    public function testGetSize()
    {
        self::assertSame($this->size, $this->sut->getSize());
    }


    public function testToString()
    {
        self::assertSame((string) $this->size, $this->sut->__toString());
    }


    public function testSerialize()
    {
        self::assertEquals($this->size, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->size));
    }
}
