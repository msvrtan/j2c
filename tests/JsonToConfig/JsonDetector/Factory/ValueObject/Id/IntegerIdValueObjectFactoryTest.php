<?php

declare(strict_types=1);

namespace Tests\JsonToConfig\JsonDetector\Factory\ValueObject\Id;

use JsonToConfig\JsonDetector\Factory\ValueObject\Id\IntegerIdValueObjectFactory;
use JsonToConfig\JsonDetector\ValueObject\Id\IntegerId;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JsonToConfig\JsonDetector\Factory\ValueObject\Id\IntegerIdValueObjectFactory
 * @group  unit
 */
class IntegerIdValueObjectFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var IntegerIdValueObjectFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new IntegerIdValueObjectFactory();
    }

    /** @dataProvider provideNonIntegerValues */
    public function testItIsNotSatisfiedByValuesThatAreNotIntegers($value)
    {
        $result = $this->sut->isSatisfiedBy('key', $value);

        self::assertFalse($result);
    }

    public function provideNonIntegerValues(): array
    {
        return [
            ['name'],
            [true],
            [[]],
        ];
    }

    /** @dataProvider provideKeysNotEndingWithId */
    public function testItIsNotSatisfiedByKeysNotEndingWithId(string $key)
    {
        $result = $this->sut->isSatisfiedBy($key, 1);

        self::assertFalse($result);
    }

    public function provideKeysNotEndingWithId(): array
    {
        return [
            ['value'],
            ['something'],
        ];
    }

    /** @dataProvider provideKeysEndingWithId */
    public function testIsSatisfiedByKeysEndingWithId(string $key)
    {
        $result = $this->sut->isSatisfiedBy($key, 1);

        self::assertTrue($result);
    }

    public function provideKeysEndingWithId(): array
    {
        return [
            ['someId'],
            ['some_id'],
            ['someID'],
        ];
    }

    public function testCreate()
    {
        self::assertInstanceOf(IntegerId::class, $this->sut->create('someId'));
    }
}
