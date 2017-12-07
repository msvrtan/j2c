<?php

declare(strict_types=1);

namespace Tests\App\CompilerPass;

use App\CompilerPass\JsonDetectorFactoryPass;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\CompilerPass\JsonDetectorFactoryPass
 * @group  todo
 */
class JsonDetectorFactoryPassTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var JsonDetectorFactoryPass */
    private $JsonDetectorFactoryPass;

    public function setUp()
    {
        $this->JsonDetectorFactoryPass = new JsonDetectorFactoryPass();
    }

    public function testProcess()
    {
        $this->markTestSkipped('Skipping');
    }
}
