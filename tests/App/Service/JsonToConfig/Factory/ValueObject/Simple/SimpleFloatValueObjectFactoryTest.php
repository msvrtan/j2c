<?php

declare(strict_types=1);

namespace Tests\App\Service\JsonToConfig\Factory\ValueObject\Simple;

use App\Service\JsonToConfig\Factory\ValueObject\Simple\SimpleFloatValueObjectFactory;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonToConfig\Factory\ValueObject\Simple\SimpleFloatValueObjectFactory
 * @group  todo
 */
class SimpleFloatValueObjectFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SimpleFloatValueObjectFactory */
    private $simpleFloatValueObjectFactory;

    public function setUp()
    {
        $this->simpleFloatValueObjectFactory = new SimpleFloatValueObjectFactory();
    }

    public function testIsSatisfiedBy()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }
}
