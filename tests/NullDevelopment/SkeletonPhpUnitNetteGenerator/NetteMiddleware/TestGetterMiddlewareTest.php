<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestGetterMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestGetterMiddleware
 * @group  todo
 */
class TestGetterMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TestGetterMiddleware */
    private $testGetterMiddleware;

    public function setUp()
    {
        $this->testGetterMiddleware = new TestGetterMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
