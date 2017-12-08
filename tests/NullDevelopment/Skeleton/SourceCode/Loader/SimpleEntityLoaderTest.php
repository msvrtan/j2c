<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\Loader;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\Core\Loader\ConstructorMethodLoader;
use NullDevelopment\Skeleton\Core\Loader\InterfaceLoader;
use NullDevelopment\Skeleton\Core\Loader\PropertyLoader;
use NullDevelopment\Skeleton\Core\Loader\TraitLoader;
use NullDevelopment\Skeleton\SourceCode\Loader\SimpleEntityLoader;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\Loader\SimpleEntityLoader
 * @group  todo
 */
class SimpleEntityLoaderTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|InterfaceLoader */
    private $interfaceLoader;
    /** @var MockInterface|TraitLoader */
    private $traitLoader;
    /** @var MockInterface|ConstructorMethodLoader */
    private $constructorMethodLoader;
    /** @var MockInterface|PropertyLoader */
    private $propertyLoader;
    /** @var SimpleEntityLoader */
    private $simpleEntityLoader;

    public function setUp()
    {
        $this->interfaceLoader         = Mockery::mock(InterfaceLoader::class);
        $this->traitLoader             = Mockery::mock(TraitLoader::class);
        $this->constructorMethodLoader = Mockery::mock(ConstructorMethodLoader::class);
        $this->propertyLoader          = Mockery::mock(PropertyLoader::class);
        $this->simpleEntityLoader      = new SimpleEntityLoader(
            $this->interfaceLoader,
            $this->traitLoader,
            $this->constructorMethodLoader,
            $this->propertyLoader
        );
    }

    public function testSupports()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testLoad()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetDefaultValues()
    {
        $this->markTestSkipped('Skipping');
    }
}
