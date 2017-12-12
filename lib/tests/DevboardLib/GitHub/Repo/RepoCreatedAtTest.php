<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoCreatedAt;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoCreatedAt
 * @group  todo
 */
class RepoCreatedAtTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var RepoCreatedAt */
    private $sut;


    public function setUp()
    {
        $this->value = '2018-01-01T11:22:33+00:00';
        $this->sut = new RepoCreatedAt($this->value);
    }


    public function testToString()
    {
        self::assertSame($this->value, $this->sut->__toString());
    }


    public function testSerialize()
    {
        self::assertEquals($this->value, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->value));
    }
}
