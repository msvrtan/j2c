<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpUnitGeneratorRegistrationCompilerPass;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnitGeneratorRegistrationCompilerPass
 * @group  todo
 */
class PhpUnitGeneratorRegistrationCompilerPassTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var PhpUnitGeneratorRegistrationCompilerPass */
    private $phpUnitGeneratorRegistrationCompilerPass;

    public function setUp()
    {
        $this->phpUnitGeneratorRegistrationCompilerPass = new PhpUnitGeneratorRegistrationCompilerPass();
    }

    public function testProcess()
    {
        $this->markTestSkipped('Skipping');
    }
}
