<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestToStringMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestToStringMiddleware
 * @group  todo
 */
class TestToStringMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TestToStringMiddleware */
    private $testToStringMiddleware;

    public function setUp()
    {
        $this->testToStringMiddleware = new TestToStringMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
