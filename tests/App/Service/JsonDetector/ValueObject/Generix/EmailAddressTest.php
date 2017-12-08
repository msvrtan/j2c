<?php

declare(strict_types=1);

namespace Tests\App\Service\JsonDetector\ValueObject\Generix;

use App\Service\JsonDetector\ValueObject\Generix\EmailAddress;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonDetector\ValueObject\Generix\EmailAddress
 * @group  todo
 */
class EmailAddressTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $key;
    /** @var EmailAddress */
    private $emailAddress;

    public function setUp()
    {
        $this->key          = 'key';
        $this->emailAddress = new EmailAddress($this->key);
    }

    public function testNothing()
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}