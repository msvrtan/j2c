<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\Php\Structure;

use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\Php\Structure\Property;
use NullDevelopment\Skeleton\Php\Structure\StructureName;
use NullDevelopment\Skeleton\Php\Structure\Visibility;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\Php\Structure\Property
 * @group  unit
 */
class PropertyTest extends TestCase
{
    /** @var string */
    private $name;
    /** @var StructureName */
    private $structureName;
    /** @var bool */
    private $nullable;
    /** @var bool */
    private $hasDefaultValue;
    /** @var mixed */
    private $defaultValue;
    /** @var Visibility */
    private $visibility;
    /** @var bool */
    private $setter;
    /** @var bool */
    private $getter;
    /** @var Property */
    private $property;

    public function setUp()
    {
        $this->name            = 'name';
        $this->structureName   = new ClassName('User', 'MyNamespace');
        $this->nullable        = true;
        $this->hasDefaultValue = false;
        $this->defaultValue    = null;
        $this->visibility      = Visibility::PRIVATE();
        $this->setter          = true;
        $this->getter          = true;
        $this->property        = new Property(
            $this->name,
            $this->structureName,
            $this->nullable,
            $this->hasDefaultValue,
            $this->defaultValue,
            $this->visibility,
            $this->setter,
            $this->getter
        );
    }

    public function testGetName()
    {
        self::assertEquals($this->name, $this->property->getName());
    }

    public function testGetStructureName()
    {
        self::assertEquals($this->structureName, $this->property->getStructureName());
    }

    public function testIsNullable()
    {
        self::assertEquals($this->nullable, $this->property->isNullable());
    }

    public function testHasDefaultValue()
    {
        self::assertEquals($this->defaultValue, $this->property->hasDefaultValue());
    }

    public function testGetDefaultValue()
    {
        self::assertEquals($this->defaultValue, $this->property->getDefaultValue());
    }

    public function testGetVisibility()
    {
        self::assertEquals($this->visibility, $this->property->getVisibility());
    }

    public function testIsSetter()
    {
        self::assertEquals($this->setter, $this->property->isSetter());
    }

    public function testIsGetter()
    {
        self::assertEquals($this->getter, $this->property->isGetter());
    }
}
