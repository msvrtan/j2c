<?php

declare(strict_types=1);

namespace Tests\App\Service\JsonToConfig\ValueObject\Simple;

use App\Service\JsonToConfig\ValueObject\Simple\SimpleFloat;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonToConfig\ValueObject\Simple\SimpleFloat
 * @group  todo
 */
class SimpleFloatTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $key;
    /** @var SimpleFloat */
    private $simpleFloat;

    public function setUp()
    {
        $this->key         = 'key';
        $this->simpleFloat = new SimpleFloat($this->key);
    }

    public function testNothing()
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
