<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\Core\Loader;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\Core\Loader\ConstructorMethodLoader;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\Core\Loader\ConstructorMethodLoader
 * @group  todo
 */
class ConstructorMethodLoaderTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ConstructorMethodLoader */
    private $constructorMethodLoader;

    public function setUp()
    {
        $this->constructorMethodLoader = new ConstructorMethodLoader();
    }

    public function testLoad()
    {
        $this->markTestSkipped('Skipping');
    }
}
