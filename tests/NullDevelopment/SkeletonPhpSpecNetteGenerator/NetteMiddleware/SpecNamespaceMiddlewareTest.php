<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecNamespaceMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecNamespaceMiddleware
 * @group  todo
 */
class SpecNamespaceMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SpecNamespaceMiddleware */
    private $specNamespaceMiddleware;

    public function setUp()
    {
        $this->specNamespaceMiddleware = new SpecNamespaceMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
