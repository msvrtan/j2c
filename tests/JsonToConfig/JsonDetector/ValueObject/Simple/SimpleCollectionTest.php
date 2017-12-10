<?php

declare(strict_types=1);

namespace Tests\JsonToConfig\JsonDetector\ValueObject\Simple;

use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleCollection;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JsonToConfig\JsonDetector\ValueObject\Simple\SimpleCollection
 * @group  todo
 */
class SimpleCollectionTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $key;
    /** @var SimpleCollection */
    private $sut;

    public function setUp()
    {
        $this->key = 'key';
        $this->sut = new SimpleCollection($this->key);
    }

    public function testNothing()
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
