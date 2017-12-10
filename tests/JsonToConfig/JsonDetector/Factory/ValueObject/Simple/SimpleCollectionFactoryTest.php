<?php

declare(strict_types=1);

namespace Tests\JsonToConfig\JsonDetector\Factory\ValueObject\Simple;

use JsonToConfig\JsonDetector\Factory\ValueObject\Simple\SimpleCollectionFactory;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JsonToConfig\JsonDetector\Factory\ValueObject\Simple\SimpleCollectionFactory
 * @group  todo
 */
class SimpleCollectionFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SimpleCollectionFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new SimpleCollectionFactory();
    }

    public function testNothing()
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
