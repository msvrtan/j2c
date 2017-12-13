<?php

declare(strict_types=1);

namespace Tests\DevboardLib\Generix;

use DevboardLib\Generix\GravatarId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\Generix\GravatarId
 * @group  todo
 */
class GravatarIdTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var GravatarId */
    private $sut;


    public function setUp()
    {
        $this->value = 'value';
        $this->sut = new GravatarId($this->value);
    }


    public function testGetValue()
    {
        self::assertSame($this->value, $this->sut->getValue());
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
