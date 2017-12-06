<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\Core\Loader;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\Core\Loader\InterfaceLoader;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\Core\Loader\InterfaceLoader
 * @group  todo
 */
class InterfaceLoaderTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var InterfaceLoader */
    private $interfaceLoader;

    public function setUp()
    {
        $this->interfaceLoader = new InterfaceLoader();
    }

    public function testLoad()
    {
        $this->markTestSkipped('Skipping');
    }
}
