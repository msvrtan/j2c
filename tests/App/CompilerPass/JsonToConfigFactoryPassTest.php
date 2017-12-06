<?php

declare(strict_types=1);

namespace Tests\App\CompilerPass;

use App\CompilerPass\JsonToConfigFactoryPass;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\CompilerPass\JsonToConfigFactoryPass
 * @group  todo
 */
class JsonToConfigFactoryPassTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var JsonToConfigFactoryPass */
    private $jsonToConfigFactoryPass;

    public function setUp()
    {
        $this->jsonToConfigFactoryPass = new JsonToConfigFactoryPass();
    }

    public function testProcess()
    {
        $this->markTestSkipped('Skipping');
    }
}
