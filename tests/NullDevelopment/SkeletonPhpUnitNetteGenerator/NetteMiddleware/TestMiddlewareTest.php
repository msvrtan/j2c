<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestMiddleware
 * @group  todo
 */
class TestMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TestMiddleware */
    private $testMiddleware;

    public function setUp()
    {
        $this->testMiddleware = new TestMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
