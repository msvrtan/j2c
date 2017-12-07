<?php

declare(strict_types=1);

namespace Tests\App\Service\JsonDetector\Factory\ValueObject\Simple;

use App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleIntegerValueObjectFactory;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleIntegerValueObjectFactory
 * @group  todo
 */
class SimpleIntegerValueObjectFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SimpleIntegerValueObjectFactory */
    private $simpleIntegerValueObjectFactory;

    public function setUp()
    {
        $this->simpleIntegerValueObjectFactory = new SimpleIntegerValueObjectFactory();
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
