<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoUpdatedAt;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoUpdatedAt
 * @group  todo
 */
class RepoUpdatedAtTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var RepoUpdatedAt */
    private $sut;


    public function setUp()
    {
        $this->value = '2018-01-01T11:22:33+00:00';
        $this->sut = new RepoUpdatedAt($this->value);
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
