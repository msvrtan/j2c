<?php

declare(strict_types=1);

namespace Tests\App\File;

use App\Config\Config;
use App\File\FileFactory;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\File\FileFactory
 * @group  todo
 */
class FileFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|Config */
    private $config;
    /** @var FileFactory */
    private $fileFactory;

    public function setUp()
    {
        $this->config      = Mockery::mock(Config::class);
        $this->fileFactory = new FileFactory($this->config);
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetPath()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateOutputResource()
    {
        $this->markTestSkipped('Skipping');
    }
}
