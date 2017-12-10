<?php

declare(strict_types=1);

namespace Tests\JsonToConfig\JsonDetector\ValueObject\Simple;

use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleBool;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JsonToConfig\JsonDetector\ValueObject\Simple\SimpleBool
 * @group  todo
 */
class SimpleBoolTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $key;
    /** @var SimpleBool */
    private $simpleBool;

    public function setUp()
    {
        $this->key        = 'key';
        $this->simpleBool = new SimpleBool($this->key);
    }

    public function testNothing()
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
