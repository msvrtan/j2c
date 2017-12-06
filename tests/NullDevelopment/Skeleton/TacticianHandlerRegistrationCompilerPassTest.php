<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\TacticianHandlerRegistrationCompilerPass;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\TacticianHandlerRegistrationCompilerPass
 * @group  todo
 */
class TacticianHandlerRegistrationCompilerPassTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TacticianHandlerRegistrationCompilerPass */
    private $tacticianHandlerRegistrationCompilerPass;

    public function setUp()
    {
        $this->tacticianHandlerRegistrationCompilerPass = new TacticianHandlerRegistrationCompilerPass();
    }

    public function testProcess()
    {
        $this->markTestSkipped('Skipping');
    }
}
