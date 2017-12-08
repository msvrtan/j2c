<?php

declare(strict_types=1);

namespace Tests\App\Service\JsonDetector\Factory\ValueObject\Simple;

use App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleCollectionFactory;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleCollectionFactory
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
