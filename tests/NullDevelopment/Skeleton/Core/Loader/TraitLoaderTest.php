<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\Core\Loader;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\Core\Loader\TraitLoader;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\Core\Loader\TraitLoader
 * @group  todo
 */
class TraitLoaderTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TraitLoader */
    private $traitLoader;

    public function setUp()
    {
        $this->traitLoader = new TraitLoader();
    }

    public function testLoad()
    {
        $this->markTestSkipped('Skipping');
    }
}
