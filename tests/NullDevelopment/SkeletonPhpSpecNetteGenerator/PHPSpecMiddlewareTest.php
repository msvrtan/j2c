<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecNetteGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\PHPSpecMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecNetteGenerator\PHPSpecMiddleware
 * @group  todo
 */
class PHPSpecMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var array */
    private $generators;
    /** @var PHPSpecMiddleware */
    private $pHPSpecMiddleware;

    public function setUp()
    {
        $this->generators        = [];
        $this->pHPSpecMiddleware = new PHPSpecMiddleware($this->generators);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
