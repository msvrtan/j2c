<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware\NamespaceMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware\NamespaceMiddleware
 * @group  todo
 */
class NamespaceMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var NamespaceMiddleware */
    private $namespaceMiddleware;

    public function setUp()
    {
        $this->namespaceMiddleware = new NamespaceMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
