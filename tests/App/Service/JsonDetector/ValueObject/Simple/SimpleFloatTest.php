<?php

declare(strict_types=1);

namespace Tests\App\Service\JsonDetector\ValueObject\Simple;

use App\Service\JsonDetector\ValueObject;
use App\Service\JsonDetector\ValueObject\Simple\SimpleFloat;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonDetector\ValueObject\Simple\SimpleFloat
 * @group  todo
 */
class SimpleFloatTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $key;
    /** @var SimpleFloat */
    private $sut;

    public function setUp()
    {
        $this->key = 'amount';
        $this->sut = new SimpleFloat($this->key);
    }

    public function testGetPriority()
    {
        self::assertEquals(ValueObject::LOW, $this->sut->getPriority());
    }
}