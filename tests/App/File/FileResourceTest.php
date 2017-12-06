<?php

declare(strict_types=1);

namespace Tests\App\File;

use App\File\FileResource;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\Php\ClassDefinition;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\File\FileResource
 * @group  todo
 */
class FileResourceTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $fileName;
    /** @var MockInterface|ClassDefinition */
    private $classSource;
    /** @var FileResource */
    private $fileResource;

    public function setUp()
    {
        $this->fileName     = 'fileName';
        $this->classSource  = Mockery::mock(ClassDefinition::class);
        $this->fileResource = new FileResource($this->fileName, $this->classSource);
    }

    public function testGetClassSource()
    {
        self::assertEquals($this->classSource, $this->fileResource->getClassSource());
    }

    public function testGetFileName()
    {
        self::assertEquals($this->fileName, $this->fileResource->getFileName());
    }
}
