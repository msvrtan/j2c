<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware\CastableToStringMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware\CastableToStringMiddleware
 * @group  todo
 */
class CastableToStringMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var CastableToStringMiddleware */
    private $castableToStringMiddleware;

    public function setUp()
    {
        $this->castableToStringMiddleware = new CastableToStringMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
