<?php

declare(strict_types=1);

namespace Tests\App\Service\JsonDetector\Factory\ValueObject\Simple;

use App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleTimestampValueObjectFactory;
use App\Service\JsonDetector\ValueObject\Simple\SimpleTimestamp;
use DateTime;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleTimestampValueObjectFactory
 * @group  todo
 */
class SimpleTimestampValueObjectFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SimpleTimestampValueObjectFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new SimpleTimestampValueObjectFactory();
    }

    /**
     * @dataProvider provideRecognizableDateTimes
     */
    public function testIsSatisfiedBy($value)
    {
        self::assertTrue($this->sut->isSatisfiedBy('createdAt', $value));
    }

    /**
     * @dataProvider provideRecognizableDateTimes
     */
    public function testDetectFormat($value, string $expectedFormat)
    {
        self::assertEquals($expectedFormat, $this->sut->detectFormat((string) $value));
    }

    /**
     * @dataProvider provideRecognizableDateTimes
     */
    public function testGuessFormatAndCreateDateTime($value)
    {
        $result = $this->sut->guessFormatAndCreateDateTime($value);

        self::assertEquals(new DateTime('2017-05-06 11:15:18'), $result);
    }

    public function provideRecognizableDateTimes(): array
    {
        return [
            ['1494069318', 'U'],
            [1494069318, 'U'],
        ];
    }

    public function testCreate()
    {
        self::assertInstanceOf(SimpleTimestamp::class, $this->sut->create('createdAt'));
    }
}
