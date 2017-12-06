<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitNetteGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\PHPUnitTestMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitNetteGenerator\PHPUnitTestMiddleware
 * @group  todo
 */
class PHPUnitTestMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var array */
    private $generators;
    /** @var PHPUnitTestMiddleware */
    private $pHPUnitTestMiddleware;

    public function setUp()
    {
        $this->generators            = [];
        $this->pHPUnitTestMiddleware = new PHPUnitTestMiddleware($this->generators);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
