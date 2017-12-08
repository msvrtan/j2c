<?php

declare(strict_types=1);

namespace Tests\App\Service\JsonDetector\ValueObject\Simple;

use App\Service\JsonDetector\ValueObject;
use App\Service\JsonDetector\ValueObject\Simple\SimpleTimestamp;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonDetector\ValueObject\Simple\SimpleTimestamp
 * @group  todo
 */
class SimpleTimestampTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $key;
    /** @var SimpleTimestamp */
    private $sut;

    public function setUp()
    {
        $this->key = 'created_at';
        $this->sut = new SimpleTimestamp($this->key);
    }

    public function testGetPriority()
    {
        self::assertEquals(ValueObject::NORMAL, $this->sut->getPriority());
    }
}
