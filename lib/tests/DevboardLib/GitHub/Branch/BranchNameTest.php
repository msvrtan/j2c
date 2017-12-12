<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Branch;

use DevboardLib\GitHub\Branch\BranchName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Branch\BranchName
 * @group  todo
 */
class BranchNameTest extends TestCase
{
    /** @var string */
    private $name;

    /** @var BranchName */
    private $sut;


    public function setUp()
    {
        $this->name = 'name';
        $this->sut = new BranchName($this->name);
    }


    public function testGetName()
    {
        self::assertSame($this->name, $this->sut->getName());
    }


    public function testToString()
    {
        self::assertSame($this->name, $this->sut->__toString());
    }


    public function testSerialize()
    {
        self::assertEquals($this->name, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->name));
    }
}
