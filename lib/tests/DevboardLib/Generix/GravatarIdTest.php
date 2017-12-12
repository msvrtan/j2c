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
    private $gravatarId;

    /** @var GravatarId */
    private $sut;


    public function setUp()
    {
        $this->gravatarId = 'gravatarId';
        $this->sut = new GravatarId($this->gravatarId);
    }


    public function testGetGravatarId()
    {
        self::assertSame($this->gravatarId, $this->sut->getGravatarId());
    }


    public function testToString()
    {
        self::assertSame($this->gravatarId, $this->sut->__toString());
    }


    public function testSerialize()
    {
        self::assertEquals($this->gravatarId, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->gravatarId));
    }
}
