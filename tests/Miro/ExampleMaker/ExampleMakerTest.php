<?php

declare(strict_types=1);

namespace Tests\Miro\ExampleMaker;

use Miro\ExampleMaker\ExampleMaker;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\Php\Structure\Variable;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Miro\ExampleMaker\ExampleMaker
 * @group  todo
 */
class ExampleMakerTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ExampleMaker */
    private $exampleMaker;

    public function setUp()
    {
        $this->exampleMaker = new ExampleMaker();
    }

    public function testItReturnsNumberOneWhenAskedForAnInteger()
    {
        $parameter = Mockery::mock(Variable::class);
        $parameter->expects('getStructureFullName')->twice()->andReturn('int');

        self::assertSame('1', $this->exampleMaker->instance($parameter));
    }

    public function testItReturnsVariableNameWhenVariableIsInstanceOfString()
    {
        $parameter = Mockery::mock(Variable::class);
        $parameter->expects('getStructureFullName')->twice()->andReturn('string');
        $parameter->expects('getName')->andReturn('description');

        self::assertSame("'description'", $this->exampleMaker->instance($parameter));
    }

    public function testItReturnsNumberWithDecimalsForFloat()
    {
        $parameter = Mockery::mock(Variable::class);
        $parameter->expects('getStructureFullName')->twice()->andReturn('float');

        self::assertSame('2.0', $this->exampleMaker->instance($parameter));
    }

    public function testItReturnsTrueWhenAskedForBoolean()
    {
        $parameter = Mockery::mock(Variable::class);
        $parameter->expects('getStructureFullName')->twice()->andReturn('bool');

        self::assertSame('true', $this->exampleMaker->instance($parameter));
    }

    public function testItReturnsSimpleArrayWhenAskedForArray()
    {
        $parameter = Mockery::mock(Variable::class);
        $parameter->expects('getStructureFullName')->twice()->andReturn('array');

        self::assertSame("['data']", $this->exampleMaker->instance($parameter));
    }

    public function testItReturnsFirstMinuteOf2018ForDateTimeExample()
    {
        $parameter = Mockery::mock(Variable::class);
        $parameter->expects('getStructureFullName')->twice()->andReturn('DateTime');

        self::assertSame("new \DateTime('2018-01-01 00:01:00')", $this->exampleMaker->instance($parameter));
    }

    ///
    ///
    ///
    ///
    ///
    ///
    ///
    ///
    ///
    ///
    ///
    ///
}
