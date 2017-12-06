<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\LetMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\LetMiddleware
 * @group  todo
 */
class LetMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var LetMiddleware */
    private $letMiddleware;

    public function setUp()
    {
        $this->letMiddleware = new LetMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
