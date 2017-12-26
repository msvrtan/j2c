<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\Method;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod
 * @group  unit
 */
class ConstructorMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var array */
    private $properties;
    /** @var ConstructorMethod */
    private $sut;

    public function setUp()
    {
        $this->properties = [
            new Property(
                'firstName',
                ClassName::create('MyVendor\\User\\UserFirstName'),
                false,
                false,
                false,
                new Visibility('private')
            ),
            new Property(
                'lastName',
                ClassName::create('MyVendor\\User\\UserLastName'),
                false,
                false,
                false,
                new Visibility('private')
            ),
        ];
        $this->sut = new ConstructorMethod($this->properties);
    }

    public function testGetName()
    {
        self::assertEquals('__construct', $this->sut->getName());
    }

    public function testGetParameters()
    {
        self::assertEquals($this->properties, $this->sut->getParameters());
    }

    public function testGetVisibility()
    {
        self::assertEquals(new Visibility('public'), $this->sut->getVisibility());
    }

    public function testGetReturnType()
    {
        self::assertEquals('', $this->sut->getReturnType());
    }

    public function testIsNullableReturnType()
    {
        self::assertFalse($this->sut->isNullableReturnType());
    }

    public function testGetImports()
    {
        self::assertEquals([], $this->sut->getImports());
    }

    public function testIsStatic()
    {
        self::assertFalse($this->sut->isStatic());
    }
}
