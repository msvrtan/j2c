<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpSpec\Method\LetMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\Method\LetMethod
 * @group  unit
 */
class LetMethodTest extends TestCase
{
    /** @var array */
    private $properties;
    /** @var LetMethod */
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
        $this->sut = new LetMethod($this->properties);
    }

    public function testGetName()
    {
        self::assertEquals('let', $this->sut->getName());
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
}
