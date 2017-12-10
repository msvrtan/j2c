<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware;

use Miro\ExampleMaker\ExampleMaker;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\SetUpMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\SetUpMiddleware
 * @group  todo
 */
class SetUpMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SetUpMiddleware */
    private $setUpMiddleware;

    public function setUp()
    {
        $this->setUpMiddleware = new SetUpMiddleware(new ExampleMaker());
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
