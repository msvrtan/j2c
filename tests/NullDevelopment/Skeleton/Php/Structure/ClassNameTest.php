<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\Php\Structure;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\Php\Structure\ClassName
 * @group  todo
 */
class ClassNameTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $className;
    /** @var string */
    private $namespace;
    /** @var ClassName */
    private $sut;

    public function setUp()
    {
        $this->className = 'className';
        $this->namespace = 'namespace';
        $this->sut       = new ClassName($this->className, $this->namespace);
    }

    public function testGetName()
    {
        self::assertEquals($this->className, $this->sut->getName());
    }

    public function testGetNamespace()
    {
        self::assertEquals($this->namespace, $this->sut->getNamespace());
    }

    public function testGetFullName()
    {
        self::assertEquals($this->namespace.'\\'.$this->className, $this->sut->getFullName());
    }

    public function testCreateFromFullyQualified()
    {
        $this->markTestSkipped('Skipping');
    }
}
