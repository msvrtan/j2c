<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecSerializationMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecSerializationMiddleware
 * @group  todo
 */
class SpecSerializationMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SpecSerializationMiddleware */
    private $specSerializationMiddleware;

    public function setUp()
    {
        $this->specSerializationMiddleware = new SpecSerializationMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
