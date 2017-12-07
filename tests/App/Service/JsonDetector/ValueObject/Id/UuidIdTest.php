<?php

declare(strict_types=1);

namespace Tests\App\Service\JsonDetector\ValueObject\Id;

use App\Service\JsonDetector\ValueObject\Id\UuidId;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonDetector\ValueObject\Id\UuidId
 * @group  todo
 */
class UuidIdTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $key;
    /** @var UuidId */
    private $uuidId;

    public function setUp()
    {
        $this->key    = 'key';
        $this->uuidId = new UuidId($this->key);
    }

    public function testNothing()
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
