<?php

declare(strict_types=1);

namespace Tests\App\Service\JsonToConfig\Factory\ValueObject\Generix;

use App\Service\JsonToConfig\Factory\ValueObject\Generix\EmailAddressValueObjectFactory;
use App\Service\JsonToConfig\ValueObject\Generix\EmailAddress;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonToConfig\Factory\ValueObject\Generix\EmailAddressValueObjectFactory
 * @group  unit
 */
class EmailAddressValueObjectFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var EmailAddressValueObjectFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new EmailAddressValueObjectFactory();
    }

    /** @dataProvider provideNonStringValues */
    public function testItIsNotSatisfiedByValuesThatAreNotStrings($value)
    {
        $result = $this->sut->isSatisfiedBy('key', $value);

        self::assertFalse($result);
    }

    public function provideNonStringValues(): array
    {
        return [
            [0],
            [true],
            [[]],
        ];
    }

    /** @dataProvider provideNonEmailValues */
    public function testItIsNotSatisfiedByValuesThatDontLookLikeEmailAddress($value)
    {
        $result = $this->sut->isSatisfiedBy('key', $value);

        self::assertFalse($result);
    }

    public function provideNonEmailValues(): array
    {
        return [
            ['John'],
            ['http://www.example.com'],
            ['John@Somewhere he is'],
        ];
    }

    /** @dataProvider provideEmailValues */
    public function testIsSatisfiedByEmailAddressValues($value)
    {
        $result = $this->sut->isSatisfiedBy('key', $value);

        self::assertTrue($result);
    }

    public function provideEmailValues(): array
    {
        return [
            ['John@example.com'],
        ];
    }

    public function testCreate()
    {
        self::assertInstanceOf(EmailAddress::class, $this->sut->create('key'));
    }
}
