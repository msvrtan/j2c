<?php

declare(strict_types=1);

namespace Tests\JsonToConfig;

use App\Config\Config;
use App\Config\Path\Psr4Path;
use App\Config\Path\SpecPsr4Path;
use App\Config\Path\TestPsr4Path;
use Tests\TestCase\SfTestCase;

/**
 * @covers \JsonToConfig\Config
 * @group  integration
 */
class ConfigTest extends SfTestCase
{
    /** @var Config */
    private $config;

    public function setUp(): void
    {
        parent::setUp();
        $this->config = $this->getService(Config::class);
        $this->markTestIncomplete('TODO');
    }

    public function testGetSourceCodePaths(): void
    {
        $expected = [
            new Psr4Path('lib/src/MyVendor/', 'MyVendor\\'),
        ];

        self::assertEquals($expected, $this->config->getSourceCodePaths());
    }

    public function testGetSpecPaths(): void
    {
        $expected = [
            new SpecPsr4Path('lib/spec/MyVendor/', 'spec\\MyVendor\\'),
        ];

        self::assertEquals($expected, $this->config->getSpecPaths());
    }

    public function testGetTestPaths(): void
    {
        $expected = [
            new TestPsr4Path('lib/tests/MyVendor/', 'Tests\\MyVendor\\'),
        ];

        self::assertEquals($expected, $this->config->getTestPaths());
    }

    public function testGetPaths(): void
    {
        $expected = [
            new TestPsr4Path('lib/tests/MyVendor/', 'Tests\\MyVendor\\'),
            new SpecPsr4Path('lib/spec/MyVendor/', 'spec\\MyVendor\\'),
            new Psr4Path('lib/src/MyVendor/', 'MyVendor\\'),
        ];

        self::assertEquals($expected, $this->config->getPaths());
    }

    public function testGetTestsNamespace(): void
    {
        self::assertEquals('Tests\\MyVendor', $this->config->getTestsNamespace());
    }

    public function testGetBaseTestClassName(): void
    {
        self::assertEquals('\PHPUnit\Framework\TestCase', $this->config->getBaseTestClassName());
    }
}
