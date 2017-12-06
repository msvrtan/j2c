<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\Php\Structure;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\Php\Structure\TraitName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\Php\Structure\TraitName
 * @group  unit
 */
class TraitNameTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $traitName;
    /** @var string */
    private $namespace;
    /** @var TraitName */
    private $sut;

    public function setUp()
    {
        $this->traitName = 'traitName';
        $this->namespace = 'namespace';
        $this->sut       = new TraitName($this->traitName, $this->namespace);
    }

    public function testGetName()
    {
        self::assertEquals($this->traitName, $this->sut->getName());
    }

    public function testGetNamespace()
    {
        self::assertEquals($this->namespace, $this->sut->getNamespace());
    }

    public function testGetFullName()
    {
        self::assertEquals($this->namespace.'\\'.$this->traitName, $this->sut->getFullName());
    }

    public function testCreateFromFullyQualified()
    {
        $this->markTestSkipped('Skipping');
    }
}
