<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\TacticianMiddlewareRegistrationCompilerPass;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\TacticianMiddlewareRegistrationCompilerPass
 * @group  todo
 */
class TacticianMiddlewareRegistrationCompilerPassTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TacticianMiddlewareRegistrationCompilerPass */
    private $tacticianMiddlewareRegistrationCompilerPass;

    public function setUp()
    {
        $this->tacticianMiddlewareRegistrationCompilerPass = new TacticianMiddlewareRegistrationCompilerPass();
    }

    public function testProcess()
    {
        $this->markTestSkipped('Skipping');
    }
}
