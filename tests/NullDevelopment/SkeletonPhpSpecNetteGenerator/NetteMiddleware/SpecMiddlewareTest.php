<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecMiddleware
 * @group  todo
 */
class SpecMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SpecMiddleware */
    private $specMiddleware;

    public function setUp()
    {
        $this->specMiddleware = new SpecMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
