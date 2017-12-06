<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestNamespaceMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestNamespaceMiddleware
 * @group  todo
 */
class TestNamespaceMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TestNamespaceMiddleware */
    private $testNamespaceMiddleware;

    public function setUp()
    {
        $this->testNamespaceMiddleware = new TestNamespaceMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
