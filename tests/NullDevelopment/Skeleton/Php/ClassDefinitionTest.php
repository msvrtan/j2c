<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\Php;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\Php\ClassDefinition;
use NullDevelopment\Skeleton\Php\Method\ConstructorMethod;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\Php\Structure\Property;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\Php\ClassDefinition
 * @group  unit
 */
class ClassDefinitionTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ClassName */
    private $name;
    /** @var MockInterface|ClassName */
    private $parent;
    /** @var array */
    private $interfaces;
    /** @var array */
    private $traits;
    /** @var MockInterface|ConstructorMethod */
    private $constructorMethod;
    /** @var array */
    private $properties;
    /** @var ClassDefinition */
    private $classDefinition;

    public function setUp()
    {
        $this->name              = new ClassName('User', 'MyNamespace');
        $this->parent            = new ClassName('UserModel', 'Vendor');
        $this->interfaces        = [];
        $this->traits            = [];
        $this->constructorMethod = Mockery::mock(ConstructorMethod::class);
        $this->properties        = [
            Mockery::mock(Property::class),
        ];
        $this->classDefinition = new ClassDefinition(
            $this->name,
            $this->parent,
            $this->interfaces,
            $this->traits,
            $this->constructorMethod,
            $this->properties
        );
    }

    public function testGetName()
    {
        self::assertEquals($this->name, $this->classDefinition->getName());
    }

    public function testGetClassName()
    {
        self::assertEquals('User', $this->classDefinition->getClassName());
    }

    public function testGetNamespace()
    {
        self::assertEquals('MyNamespace', $this->classDefinition->getNamespace());
    }

    public function testGetFullClassName()
    {
        self::assertEquals('MyNamespace\User', $this->classDefinition->getFullClassName());
    }

    public function testHasParent()
    {
        self::assertTrue($this->classDefinition->hasParent());
    }

    public function testGetParent()
    {
        self::assertEquals($this->parent, $this->classDefinition->getParent());
    }

    public function testGetParentClassName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetParentFullClassName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHasInterfaces()
    {
        self::assertFalse($this->classDefinition->hasInterfaces());
    }

    public function testGetInterfaces()
    {
        self::assertEmpty($this->classDefinition->getInterfaces());
    }

    public function testHasTraits()
    {
        self::assertFalse($this->classDefinition->hasTraits());
    }

    public function testGetTraits()
    {
        self::assertEmpty($this->classDefinition->getTraits());
    }

    public function testHasConstructorMethod()
    {
        self::assertTrue($this->classDefinition->hasConstructorMethod());
    }

    public function testGetConstructorMethod()
    {
        self::assertEquals($this->constructorMethod, $this->classDefinition->getConstructorMethod());
    }

    public function testGetConstructorParameters()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHasProperties()
    {
        self::assertTrue($this->classDefinition->hasProperties());
    }

    public function testGetProperties()
    {
        self::assertEquals($this->properties, $this->classDefinition->getProperties());
    }
}
