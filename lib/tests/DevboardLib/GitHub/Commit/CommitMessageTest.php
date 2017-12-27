<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitMessage;
use PHPUnit\Framework\TestCase;

class CommitMessageTest extends TestCase
{
    /** @var string */
    private $message;

    /** @var CommitMessage */
    private $sut;


    public function setUp()
    {
        $this->message = 'message';
        $this->sut = new CommitMessage($this->message);
    }


    public function testGetMessage()
    {
        self::assertSame($this->message, $this->sut->getMessage());
    }


    public function testGetValue()
    {
        self::assertSame($this->message, $this->sut->getValue());
    }


    public function testToString()
    {
        self::assertSame($this->message, $this->sut->__toString());
    }


    public function testSerialize()
    {
        self::assertEquals($this->message, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->message));
    }
}
