<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\Php\Structure;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\Php\Structure\SimpleVariable;
use NullDevelopment\Skeleton\Php\Structure\StructureName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\Php\Structure\SimpleVariable
 * @group todo
 */
class SimpleVariableTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $name;
    /** @var MockInterface|StructureName */
    private $structureName;
    /** @var SimpleVariable */
    private $simpleVariable;

    public function setUp()
    {
        $this->name           = 'name';
        $this->structureName  = Mockery::mock(StructureName::class);
        $this->simpleVariable = new SimpleVariable($this->name, $this->structureName);
    }

    public function testGetName()
    {
        self::assertEquals($this->name, $this->simpleVariable->getName());
    }

    public function testGetStructureName()
    {
        self::assertEquals($this->structureName, $this->simpleVariable->getStructureName());
    }

    public function testGetStructureFullName()
    {
        $this->markTestSkipped('Skipping');
    }
}
