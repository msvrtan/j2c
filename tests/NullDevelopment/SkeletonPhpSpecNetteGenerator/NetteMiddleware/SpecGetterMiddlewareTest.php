<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecGetterMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecGetterMiddleware
 * @group  todo
 */
class SpecGetterMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SpecGetterMiddleware */
    private $specGetterMiddleware;

    public function setUp()
    {
        $this->specGetterMiddleware = new SpecGetterMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
