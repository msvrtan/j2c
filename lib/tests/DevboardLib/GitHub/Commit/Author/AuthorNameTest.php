<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit\Author;

use DevboardLib\GitHub\Commit\Author\AuthorName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\Author\AuthorName
 * @group  todo
 */
class AuthorNameTest extends TestCase
{
    /** @var string */
    private $name;

    /** @var AuthorName */
    private $sut;


    public function setUp()
    {
        $this->name = 'name';
        $this->sut = new AuthorName($this->name);
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
