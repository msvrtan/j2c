<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\Php\Structure;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\Php\Structure\MethodParameter;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\Php\Structure\MethodParameter
 * @group  unit
 */
class MethodParameterTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $name;
    /** @var MockInterface|ClassName */
    private $className;
    /** @var bool */
    private $nullable;
    /** @var bool */
    private $hasDefaultValue;
    /** @var mixed */
    private $defaultValue;
    /** @var MethodParameter */
    private $methodParameter;

    public function setUp()
    {
        $this->name            = 'name';
        $this->className       = new ClassName('User', 'MyNamespace');
        $this->nullable        = true;
        $this->hasDefaultValue = false;
        $this->defaultValue    = null;
        $this->methodParameter = new MethodParameter(
            $this->name,
            $this->className,
            $this->nullable,
            $this->hasDefaultValue,
            $this->defaultValue
        );
    }

    public function testGetName()
    {
        self::assertEquals($this->name, $this->methodParameter->getName());
    }

    public function testGetClassName()
    {
        self::assertEquals($this->className, $this->methodParameter->getClassName());
    }

    public function testIsNullable()
    {
        self::assertEquals($this->nullable, $this->methodParameter->isNullable());
    }

    public function testHasDefaultValue()
    {
        self::assertEquals($this->defaultValue, $this->methodParameter->hasDefaultValue());
    }

    public function testGetDefaultValue()
    {
        self::assertEquals($this->defaultValue, $this->methodParameter->getDefaultValue());
    }
}
