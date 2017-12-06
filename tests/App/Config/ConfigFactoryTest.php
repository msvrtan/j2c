<?php

declare(strict_types=1);

namespace Tests\App\Config;

use App\Config\Config;
use App\Config\ConfigFactory;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Config\ConfigFactory
 * @group  unit
 */
class ConfigFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ConfigFactory */
    private $configFactory;

    public function setUp()
    {
        $this->configFactory = new ConfigFactory();
    }

    public function testItReturnsConfigOut(): void
    {
        self::assertInstanceOf(Config::class, $this->configFactory->create());
    }
}
