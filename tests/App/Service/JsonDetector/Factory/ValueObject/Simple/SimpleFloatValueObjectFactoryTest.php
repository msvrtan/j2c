<?php

declare(strict_types=1);

namespace Tests\App\Service\JsonDetector\Factory\ValueObject\Simple;

use App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleFloatValueObjectFactory;
use App\Service\JsonDetector\ValueObject\Simple\SimpleFloat;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleFloatValueObjectFactory
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
