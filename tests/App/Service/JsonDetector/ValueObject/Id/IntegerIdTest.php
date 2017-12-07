<?php

declare(strict_types=1);

namespace Tests\App\Service\JsonDetector\ValueObject\Id;

use App\Service\JsonDetector\ValueObject\Id\IntegerId;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonDetector\ValueObject\Id\IntegerId
 * @group  todo
 */
class IntegerIdTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $key;
    /** @var IntegerId */
    private $integerId;

    public function setUp()
    {
        $this->key       = 'key';
        $this->integerId = new IntegerId($this->key);
    }

    public function testNothing()
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
