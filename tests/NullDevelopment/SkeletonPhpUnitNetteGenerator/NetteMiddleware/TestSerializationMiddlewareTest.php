<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestSerializationMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestSerializationMiddleware
 * @group  todo
 */
class TestSerializationMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TestSerializationMiddleware */
    private $testSerializationMiddleware;

    public function setUp()
    {
        $this->testSerializationMiddleware = new TestSerializationMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
