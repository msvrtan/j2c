<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware\ClassMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware\ClassMiddleware
 * @group  todo
 */
class ClassMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ClassMiddleware */
    private $classMiddleware;

    public function setUp()
    {
        $this->classMiddleware = new ClassMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
