<?php

declare(strict_types=1);

namespace Tests\App\Service\JsonDetector\Factory\ValueObject\Simple;

use App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleStringValueObjectFactory;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleStringValueObjectFactory
 * @group  todo
 */
class SimpleStringValueObjectFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SimpleStringValueObjectFactory */
    private $simpleStringValueObjectFactory;

    public function setUp()
    {
        $this->simpleStringValueObjectFactory = new SimpleStringValueObjectFactory();
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
