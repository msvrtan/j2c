<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\ObjectConfigurationLoaderCompilerPass;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\ObjectConfigurationLoaderCompilerPass
 * @group  todo
 */
class ObjectConfigurationLoaderCompilerPassTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ObjectConfigurationLoaderCompilerPass */
    private $objectConfigurationLoaderCompilerPass;

    public function setUp()
    {
        $this->objectConfigurationLoaderCompilerPass = new ObjectConfigurationLoaderCompilerPass();
    }

    public function testProcess()
    {
        $this->markTestSkipped('Skipping');
    }
}
