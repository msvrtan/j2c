<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware\SerializationMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware\SerializationMiddleware
 * @group  todo
 */
class SerializationMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SerializationMiddleware */
    private $serializationMiddleware;

    public function setUp()
    {
        $this->serializationMiddleware = new SerializationMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
