<?php

declare(strict_types=1);

namespace Tests\App\Service;

use App\Service\JsonToConfig;
use App\Service\JsonToConfig\Factory\ValueObject\Generix\EmailAddressValueObjectFactory;
use App\Service\JsonToConfig\Factory\ValueObject\Generix\UrlValueObjectFactory;
use App\Service\JsonToConfig\Factory\ValueObject\Id\IntegerIdValueObjectFactory;
use App\Service\JsonToConfig\Factory\ValueObject\Id\UuidIdValueObjectFactory;
use App\Service\JsonToConfig\Factory\ValueObject\Simple\SimpleBoolValueObjectFactory;
use App\Service\JsonToConfig\Factory\ValueObject\Simple\SimpleFloatValueObjectFactory;
use App\Service\JsonToConfig\Factory\ValueObject\Simple\SimpleIntegerValueObjectFactory;
use App\Service\JsonToConfig\Factory\ValueObject\Simple\SimpleStringValueObjectFactory;
use App\Service\JsonToConfig\ValueObject\Id\IntegerId;
use App\Service\JsonToConfig\ValueObject\Simple\SimpleBool;
use App\Service\JsonToConfig\ValueObject\Simple\SimpleFloat;
use App\Service\JsonToConfig\ValueObject\Simple\SimpleInteger;
use App\Service\JsonToConfig\ValueObject\Simple\SimpleString;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonToConfig
 * @group  integration
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class JsonToConfigTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var JsonToConfig */
    private $jsonToConfig;

    public function setUp()
    {
        $this->jsonToConfig = new JsonToConfig(
            [
                new SimpleBoolValueObjectFactory(),
                new SimpleFloatValueObjectFactory(),
                new SimpleIntegerValueObjectFactory(),
                new SimpleStringValueObjectFactory(),
                new EmailAddressValueObjectFactory(),
                new UrlValueObjectFactory(),
                new IntegerIdValueObjectFactory(),
                new UuidIdValueObjectFactory(),
            ]
        );
    }

    public function testBool()
    {
        $input    = ['active' => true];
        $expected = ['active' => [new SimpleBool('active')]];

        $result = $this->jsonToConfig->createConfig($input);

        self::assertEquals($expected, $result);
    }

    public function testFloat()
    {
        $input    = ['amount' => 1.8];
        $expected = ['amount' => [new SimpleFloat('amount')]];

        $result = $this->jsonToConfig->createConfig($input);

        self::assertEquals($expected, $result);
    }

    public function testInteger()
    {
        $input    = ['number' => 1];
        $expected = ['number' => [new SimpleInteger('number')]];

        $result = $this->jsonToConfig->createConfig($input);

        self::assertEquals($expected, $result);
    }

    public function testString()
    {
        $input    = ['first_name' => 'John'];
        $expected = ['first_name' => [new SimpleString('first_name')]];

        $result = $this->jsonToConfig->createConfig($input);

        self::assertEquals($expected, $result);
    }

    public function testMultipleInputItems()
    {
        $input = [
            'first_name' => 'John',
            'active'     => true,
            'height'     => 1.8,
        ];
        $expected = [
            'first_name' => [new SimpleString('first_name')],
            'active'     => [new SimpleBool('active')],
            'height'     => [new SimpleFloat('height')],
        ];

        $result = $this->jsonToConfig->createConfig($input);

        self::assertEquals($expected, $result);
    }

    public function testMultipleResults()
    {
        $input = [
            'someId' => 1,
        ];
        $expected = [
            'someId' => [
                new IntegerId('someId'),
                new SimpleInteger('someId'),
            ],
        ];

        $result = $this->jsonToConfig->createConfig($input);

        self::assertEquals($expected, $result);
    }
}
