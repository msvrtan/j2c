<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\Php\Structure;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\Php\Structure\InterfaceName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\Php\Structure\InterfaceName
 * @group  todo
 */
class InterfaceNameTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $interfaceName;
    /** @var string */
    private $namespace;
    /** @var InterfaceName */
    private $sut;

    public function setUp()
    {
        $this->interfaceName = 'interfaceName';
        $this->namespace     = 'namespace';
        $this->sut           = new InterfaceName($this->interfaceName, $this->namespace);
    }

    public function testGetName()
    {
        self::assertEquals($this->interfaceName, $this->sut->getName());
    }

    public function testGetNamespace()
    {
        self::assertEquals($this->namespace, $this->sut->getNamespace());
    }

    public function testGetFullName()
    {
        self::assertEquals($this->namespace.'\\'.$this->interfaceName, $this->sut->getFullName());
    }

    public function testCreateFromFullyQualified()
    {
        $this->markTestSkipped('Skipping');
    }
}
