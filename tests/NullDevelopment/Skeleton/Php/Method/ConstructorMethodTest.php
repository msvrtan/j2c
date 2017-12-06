<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\Php\Method;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\Php\Method\ConstructorMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\Php\Method\ConstructorMethod
 * @group  todo
 */
class ConstructorMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var array */
    private $parameters;
    /** @var ConstructorMethod */
    private $constructorMethod;

    public function setUp()
    {
        $this->parameters        = [];
        $this->constructorMethod = new ConstructorMethod($this->parameters);
    }

    public function testGetParameters()
    {
        self::assertEquals($this->parameters, $this->constructorMethod->getParameters());
    }
}
