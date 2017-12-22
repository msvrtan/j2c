<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Method\SetterMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\Method\SetterMethod
 * @group  unit
 */
class SetterMethodTest extends TestCase
{
    /** @var string */
    private $name;
    /** @var Property */
    private $property;
    /** @var SetterMethod */
    private $sut;

    public function setUp()
    {
        $this->name     = 'name';
        $this->property = new Property(
            'firstName',
            ClassName::create('MyVendor\\User\\UserFirstName'),
            false,
            false,
            false,
            new Visibility('private')
        );
        $this->sut = new SetterMethod($this->name, $this->property);
    }

    public function testGetProperty()
    {
        self::assertEquals($this->property, $this->sut->getProperty());
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
