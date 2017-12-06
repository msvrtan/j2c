<?php

declare(strict_types=1);

namespace Tests\App\File;

use App\File\OutputResource;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\Php\ClassDefinition;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\File\OutputResource
 * @group  todo
 */
class OutputResourceTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $fileName;
    /** @var MockInterface|ClassDefinition */
    private $classSource;
    /** @var string */
    private $output;
    /** @var OutputResource */
    private $outputResource;

    public function setUp()
    {
        $this->fileName       = 'fileName';
        $this->classSource    = Mockery::mock(ClassDefinition::class);
        $this->output         = 'output';
        $this->outputResource = new OutputResource($this->fileName, $this->classSource, $this->output);
    }

    public function testGetFileName()
    {
        self::assertEquals($this->fileName, $this->outputResource->getFileName());
    }

    public function testGetClassSource()
    {
        self::assertEquals($this->classSource, $this->outputResource->getClassSource());
    }

    public function testGetOutput()
    {
        self::assertEquals($this->output, $this->outputResource->getOutput());
    }
}
