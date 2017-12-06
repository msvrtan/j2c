<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\Core\Loader;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\Core\Loader\PropertyLoader;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\Core\Loader\PropertyLoader
 * @group  todo
 */
class PropertyLoaderTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var PropertyLoader */
    private $propertyLoader;

    public function setUp()
    {
        $this->propertyLoader = new PropertyLoader();
    }

    public function testLoad()
    {
        $this->markTestSkipped('Skipping');
    }
}
