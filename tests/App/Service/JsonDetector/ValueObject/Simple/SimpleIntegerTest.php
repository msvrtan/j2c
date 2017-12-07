<?php

declare(strict_types=1);

namespace Tests\App\Service\JsonDetector\ValueObject\Simple;

use App\Service\JsonDetector\ValueObject\Simple\SimpleInteger;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonDetector\ValueObject\Simple\SimpleInteger
 * @group  todo
 */
class SimpleIntegerTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $key;
    /** @var SimpleInteger */
    private $simpleInteger;

    public function setUp()
    {
        $this->key           = 'key';
        $this->simpleInteger = new SimpleInteger($this->key);
    }

    public function testNothing()
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
