<?php

declare(strict_types=1);

namespace Tests\DevboardLib\Git\Commit;

use DevboardLib\Git\Commit\CommitDate;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\Git\Commit\CommitDate
 * @group  todo
 */
class CommitDateTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var CommitDate */
    private $sut;


    public function setUp()
    {
        $this->value = '2018-01-01T11:22:33+00:00';
        $this->sut = new CommitDate($this->value);
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
