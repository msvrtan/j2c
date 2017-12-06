<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpSpecGeneratorRegistrationCompilerPass;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpecGeneratorRegistrationCompilerPass
 * @group  todo
 */
class PhpSpecGeneratorRegistrationCompilerPassTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var PhpSpecGeneratorRegistrationCompilerPass */
    private $phpSpecGeneratorRegistrationCompilerPass;

    public function setUp()
    {
        $this->phpSpecGeneratorRegistrationCompilerPass = new PhpSpecGeneratorRegistrationCompilerPass();
    }

    public function testProcess()
    {
        $this->markTestSkipped('Skipping');
    }
}
