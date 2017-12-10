<?php

declare(strict_types=1);

namespace Tests\JsonToConfig\JsonDetector\ValueObject\Generix;

use JsonToConfig\JsonDetector\ValueObject\Generix\Url;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JsonToConfig\JsonDetector\ValueObject\Generix\Url
 * @group  todo
 */
class UrlTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $key;
    /** @var Url */
    private $url;

    public function setUp()
    {
        $this->key = 'key';
        $this->url = new Url($this->key);
    }

    public function testNothing()
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
