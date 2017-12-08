<?php

declare(strict_types=1);

namespace Tests\App\Service\JsonDetector\ValueObject\Simple;

use App\Service\JsonDetector\ValueObject\Simple\SimpleCollection;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonDetector\ValueObject\Simple\SimpleCollection
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
