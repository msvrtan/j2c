<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoFullName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoFullName
 * @group  todo
 */
class RepoFullNameTest extends TestCase
{
    /** @var string */
    private $fullName;

    /** @var RepoFullName */
    private $sut;


    public function setUp()
    {
        $this->fullName = 'fullName';
        $this->sut = new RepoFullName($this->fullName);
    }


    public function testGetFullName()
    {
        self::assertSame($this->fullName, $this->sut->getFullName());
    }


    public function testToString()
    {
        self::assertSame($this->fullName, $this->sut->__toString());
    }


    public function testSerialize()
    {
        self::assertEquals($this->fullName, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->fullName));
    }
}
