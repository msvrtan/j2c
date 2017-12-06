<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\Loader;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\Core\Loader\InterfaceLoader;
use NullDevelopment\Skeleton\Core\Loader\TraitLoader;
use NullDevelopment\Skeleton\SourceCode\Loader\DateTimeValueObjectLoader;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\Loader\DateTimeValueObjectLoader
 * @group  todo
 */
class DateTimeValueObjectLoaderTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|InterfaceLoader */
    private $interfaceLoader;
    /** @var MockInterface|TraitLoader */
    private $traitLoader;
    /** @var DateTimeValueObjectLoader */
    private $dateTimeValueObjectLoader;

    public function setUp()
    {
        $this->interfaceLoader           = Mockery::mock(InterfaceLoader::class);
        $this->traitLoader               = Mockery::mock(TraitLoader::class);
        $this->dateTimeValueObjectLoader = new DateTimeValueObjectLoader($this->interfaceLoader, $this->traitLoader);
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
