<?php

declare(strict_types=1);

namespace Tests\App\Service\JsonToConfig\Factory\ValueObject\Generix;

use App\Service\JsonToConfig\Factory\ValueObject\Generix\UrlValueObjectFactory;
use App\Service\JsonToConfig\ValueObject\Generix\Url;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonToConfig\Factory\ValueObject\Generix\UrlValueObjectFactory
 * @group  unit
 */
class UrlValueObjectFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var UrlValueObjectFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new UrlValueObjectFactory();
    }

    /** @dataProvider provideNonStringValues */
    public function testItIsNotSatisfiedByValuesThatAreNotStrings($value)
    {
        $result = $this->sut->isSatisfiedBy('key', $value);

        self::assertFalse($result);
    }

    public function provideNonStringValues(): array
    {
        return [
            [0],
            [true],
            [[]],
        ];
    }

    /** @dataProvider provideNonUrlValues */
    public function testItIsNotSatisfiedByValuesThatDontLookLikeUrlAddress($value)
    {
        $result = $this->sut->isSatisfiedBy('key', $value);

        self::assertFalse($result);
    }

    public function provideNonUrlValues(): array
    {
        return [
            ['John'],
            ['John@example.com'],
            ['John@Somewhere he is'],
        ];
    }

    /** @dataProvider provideUrlValues */
    public function testIsSatisfiedByUrlAddressValues($value)
    {
        $result = $this->sut->isSatisfiedBy('key', $value);

        self::assertTrue($result);
    }

    public function provideUrlValues(): array
    {
        return [
            ['http://www.example.com'],
        ];
    }

    public function testCreate()
    {
        self::assertInstanceOf(Url::class, $this->sut->create('key'));
    }
}
