<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecToStringMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecToStringMiddleware
 * @group  todo
 */
class SpecToStringMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SpecToStringMiddleware */
    private $specToStringMiddleware;

    public function setUp()
    {
        $this->specToStringMiddleware = new SpecToStringMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
