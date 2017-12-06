<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware\ConstructorMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware\ConstructorMiddleware
 * @group  todo
 */
class ConstructorMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ConstructorMiddleware */
    private $constructorMiddleware;

    public function setUp()
    {
        $this->constructorMiddleware = new ConstructorMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
