<?php

declare(strict_types=1);

namespace Tests\App\Service\JsonToConfig\ValueObject\Simple;

use App\Service\JsonToConfig\ValueObject\Simple\SimpleString;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonToConfig\ValueObject\Simple\SimpleString
 * @group  todo
 */
class SimpleStringTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $key;
    /** @var SimpleString */
    private $simpleString;

    public function setUp()
    {
        $this->key          = 'key';
        $this->simpleString = new SimpleString($this->key);
    }

    public function testNothing()
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
