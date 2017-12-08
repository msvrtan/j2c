<?php

declare(strict_types=1);

namespace Tests\App\Service\JsonDetector\ValueObject\Simple;

use App\Service\JsonDetector\ValueObject;
use App\Service\JsonDetector\ValueObject\Simple\SimpleDateTime;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonDetector\ValueObject\Simple\SimpleDateTime
 * @group todo
 */
class SimpleDateTimeTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $key;
    /** @var SimpleDateTime */
    private $sut;

    public function setUp()
    {
        $this->key = 'created_at';
        $this->sut = new SimpleDateTime($this->key);
    }

    public function testGetPriority()
    {
        self::assertEquals(ValueObject::NORMAL, $this->sut->getPriority());
    }
}
