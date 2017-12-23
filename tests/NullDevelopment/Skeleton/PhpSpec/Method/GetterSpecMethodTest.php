<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpSpec\Method\GetterSpecMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\Method\GetterSpecMethod
 * @group  unit
 */
class GetterSpecMethodTest extends TestCase
{
    /** @var string */
    private $name;
    /** @var string */
    private $methodUnderTest;
    /** @var Property */
    private $property;
    /** @var GetterSpecMethod */
    private $sut;

    public function setUp()
    {
        $this->name            = 'it_exposes_first_name';
        $this->methodUnderTest = 'methodUnderTest';
        $this->property        = new Property(
            'firstName',
            ClassName::create('MyVendor\\User\\UserFirstName'),
            false,
            false,
            false,
            new Visibility('private')
        );
        $this->sut = new GetterSpecMethod($this->name, $this->methodUnderTest, $this->property);
    }

    public function testGetMethodUnderTest()
    {
        self::assertEquals($this->methodUnderTest, $this->sut->getMethodUnderTest());
    }

    public function testGetProperty()
    {
        self::assertEquals($this->property, $this->sut->getProperty());
    }

    public function testGetPropertyName()
    {
        self::assertEquals('firstName', $this->sut->getPropertyName());
    }

    public function testGetVisibility()
    {
        self::assertEquals(new Visibility('public'), $this->sut->getVisibility());
    }

    public function testGetName()
    {
        self::assertEquals($this->name, $this->sut->getName());
    }

    public function testGetParameters()
    {
        self::assertEquals([$this->property], $this->sut->getParameters());
    }

    public function testGetReturnType()
    {
        self::assertEquals('', $this->sut->getReturnType());
    }

    public function testIsNullableReturnType()
    {
        self::assertFalse($this->sut->isNullableReturnType());
    }
}
