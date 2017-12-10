<?php

declare(strict_types=1);

namespace Tests\JsonToConfig\JsonDetector\Factory\ValueObject\Simple;

use DateTime;
use JsonToConfig\JsonDetector\Factory\ValueObject\Simple\SimpleDateTimeValueObjectFactory;
use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleDateTime;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JsonToConfig\JsonDetector\Factory\ValueObject\Simple\SimpleDateTimeValueObjectFactory
 * @group  unit
 */
class SimpleDateTimeValueObjectFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SimpleDateTimeValueObjectFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new SimpleDateTimeValueObjectFactory();
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
        self::assertEquals($expectedFormat, $this->sut->detectFormat($value));
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
            ['2017-05-06 11:15:18', 'Y-m-d H:i:s'],
            ['2017-05-06T11:15:18Z', 'Y-m-d\TH:i:sP'],
            ['2017-05-06T11:15:18+00:00', 'Y-m-d\TH:i:sP'],
            //['1494069318', 'U'],
            //[1494069318, 'U'],
        ];
    }

    public function testCreate()
    {
        self::assertInstanceOf(SimpleDateTime::class, $this->sut->create('createdAt'));
    }
}
