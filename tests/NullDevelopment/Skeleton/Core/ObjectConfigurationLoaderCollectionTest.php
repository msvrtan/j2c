<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\Core;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\Core\ObjectConfigurationLoaderCollection;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\Core\ObjectConfigurationLoaderCollection
 * @group  todo
 */
class ObjectConfigurationLoaderCollectionTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var array */
    private $loaders;
    /** @var ObjectConfigurationLoaderCollection */
    private $objectConfigurationLoaderCollection;

    public function setUp()
    {
        $this->loaders                             = [];
        $this->objectConfigurationLoaderCollection = new ObjectConfigurationLoaderCollection($this->loaders);
    }

    public function testGetLoaders()
    {
        self::assertEquals($this->loaders, $this->objectConfigurationLoaderCollection->getLoaders());
    }

    public function testFindAndLoad()
    {
        $this->markTestSkipped('Skipping');
    }
}
