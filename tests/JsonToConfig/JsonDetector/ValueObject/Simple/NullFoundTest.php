<?php

declare(strict_types=1);

namespace Tests\JsonToConfig\JsonDetector\ValueObject\Simple;

use JsonToConfig\JsonDetector\ValueObject\Simple\NullFound;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JsonToConfig\JsonDetector\ValueObject\Simple\NullFound
 * @group todo
 */
class NullFoundTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $key;
    /** @var NullFound */
    private $nullFound;

    public function setUp()
    {
        $this->key       = 'key';
        $this->nullFound = new NullFound($this->key);
    }

    public function testGetPriority()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetSorting()
    {
        $this->markTestSkipped('Skipping');
    }
}
