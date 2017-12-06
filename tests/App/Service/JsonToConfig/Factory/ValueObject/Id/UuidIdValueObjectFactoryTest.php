<?php

declare(strict_types=1);

namespace Tests\App\Service\JsonToConfig\Factory\ValueObject\Id;

use App\Service\JsonToConfig\Factory\ValueObject\Id\UuidIdValueObjectFactory;
use App\Service\JsonToConfig\ValueObject\Id\UuidId;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonToConfig\Factory\ValueObject\Id\UuidIdValueObjectFactory
 * @group  unit
 */
class UuidIdValueObjectFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var UuidIdValueObjectFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new UuidIdValueObjectFactory();
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

    /** @dataProvider provideKeysNotEndingWithId */
    public function testItIsNotSatisfiedByKeysNotEndingWithId(string $key)
    {
        $result = $this->sut->isSatisfiedBy($key, 'cdb94069-6b3f-40b4-b3f6-cbe1d5f7f854');

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
        $result = $this->sut->isSatisfiedBy($key, 'd6bff2c0-e303-40eb-835d-22a537ea16a6');

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

    /** @dataProvider provideNonUuidValues */
    public function testItIsNotSatisfiedByValuesThatDontLookLikeUuid($value)
    {
        $result = $this->sut->isSatisfiedBy('myId', $value);

        self::assertFalse($result);
    }

    public function provideNonUuidValues(): array
    {
        return [
            ['John'],
            ['http://www.example.com'],
            ['John@Somewhere he is'],
            ['0000-000-000-0000'],
        ];
    }

    /** @dataProvider provideUuidValues */
    public function testIsSatisfiedByUuidValues($value)
    {
        $result = $this->sut->isSatisfiedBy('myId', $value);

        self::assertTrue($result);
    }

    public function provideUuidValues(): array
    {
        return [
            ['7453e1a2-44f2-4442-8191-207b6250ad05'],
            ['406bbd59-ff2f-4863-915e-fedf18b697e7'],
            ['ad8bc1c6-a62f-4722-a965-f5fc03e218b3'],
            ['420cfff8-4871-49b3-8f53-8af5147d13d5'],
            ['3b7a8fe3-ecb2-4ede-8ecf-75ea256daa3c'],
            ['d662ca48-2af9-4480-aa64-5e63945a7ee5'],
            ['3484bda6-1e34-40f9-85c5-fc34fd8475ac'],
        ];
    }

    public function testCreate()
    {
        self::assertInstanceOf(UuidId::class, $this->sut->create('someId'));
    }
}
