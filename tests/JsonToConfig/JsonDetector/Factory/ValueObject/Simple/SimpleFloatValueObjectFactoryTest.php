<?php

declare(strict_types=1);

namespace Tests\JsonToConfig\JsonDetector\Factory\ValueObject\Simple;

use JsonToConfig\JsonDetector\Factory\ValueObject\Simple\SimpleFloatValueObjectFactory;
use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleFloat;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JsonToConfig\JsonDetector\Factory\ValueObject\Simple\SimpleFloatValueObjectFactory
 * @group  todo
 */
class SimpleFloatValueObjectFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SimpleFloatValueObjectFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new SimpleFloatValueObjectFactory();
    }

    public function testIsSatisfiedBy()
    {
        self::assertTrue($this->sut->isSatisfiedBy('amount', 2.1));
    }

    public function testCreate()
    {
        self::assertInstanceOf(SimpleFloat::class, $this->sut->create('amount'));
    }
}
