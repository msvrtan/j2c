<?php

declare(strict_types=1);

namespace Tests\App\Config;

use App\Config\Config;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Config\Config
 * @group  todo
 */
class ConfigTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var array */
    private $sourceCodePaths;
    /** @var array */
    private $specPaths;
    /** @var array */
    private $testPaths;
    /** @var string */
    private $testsNamespace;
    /** @var string */
    private $baseTestClassName;
    /** @var Config */
    private $config;

    public function setUp()
    {
        $this->sourceCodePaths   = [];
        $this->specPaths         = [];
        $this->testPaths         = [];
        $this->testsNamespace    = 'testsNamespace';
        $this->baseTestClassName = 'baseTestClassName';
        $this->config            = new Config(
            $this->sourceCodePaths,
            $this->specPaths,
            $this->testPaths,
            $this->testsNamespace,
            $this->baseTestClassName
        );
    }

    public function testGetSourceCodePaths()
    {
        self::assertEquals($this->sourceCodePaths, $this->config->getSourceCodePaths());
    }

    public function testGetSpecPaths()
    {
        self::assertEquals($this->specPaths, $this->config->getSpecPaths());
    }

    public function testGetTestPaths()
    {
        self::assertEquals($this->testPaths, $this->config->getTestPaths());
    }

    public function testGetPaths()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetTestsNamespace()
    {
        self::assertEquals($this->testsNamespace, $this->config->getTestsNamespace());
    }

    public function testGetBaseTestClassName()
    {
        self::assertEquals($this->baseTestClassName, $this->config->getBaseTestClassName());
    }
}
