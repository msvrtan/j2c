<?php

declare(strict_types=1);

namespace Tests\App\Service;

use App\Service\JsonDetector;
use App\Service\JsonDetector\Factory\ValueObject\Generix\EmailAddressValueObjectFactory;
use App\Service\JsonDetector\Factory\ValueObject\Generix\UrlValueObjectFactory;
use App\Service\JsonDetector\Factory\ValueObject\Id\IntegerIdValueObjectFactory;
use App\Service\JsonDetector\Factory\ValueObject\Id\UuidIdValueObjectFactory;
use App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleBoolValueObjectFactory;
use App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleFloatValueObjectFactory;
use App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleIntegerValueObjectFactory;
use App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleStringValueObjectFactory;
use App\Service\JsonDetector\ValueObject\Id\IntegerId;
use App\Service\JsonDetector\ValueObject\Simple\SimpleBool;
use App\Service\JsonDetector\ValueObject\Simple\SimpleFloat;
use App\Service\JsonDetector\ValueObject\Simple\SimpleInteger;
use App\Service\JsonDetector\ValueObject\Simple\SimpleString;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\JsonDetector
 * @group  integration
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class JsonDetectorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var JsonDetector */
    private $JsonDetector;

    public function setUp()
    {
        $this->JsonDetector = new JsonDetector(
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

        $result = $this->JsonDetector->createConfig($input);

        self::assertEquals($expected, $result);
    }

    public function testFloat()
    {
        $input    = ['amount' => 1.8];
        $expected = ['amount' => [new SimpleFloat('amount')]];

        $result = $this->JsonDetector->createConfig($input);

        self::assertEquals($expected, $result);
    }

    public function testInteger()
    {
        $input    = ['number' => 1];
        $expected = ['number' => [new SimpleInteger('number')]];

        $result = $this->JsonDetector->createConfig($input);

        self::assertEquals($expected, $result);
    }

    public function testString()
    {
        $input    = ['first_name' => 'John'];
        $expected = ['first_name' => [new SimpleString('first_name')]];

        $result = $this->JsonDetector->createConfig($input);

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

        $result = $this->JsonDetector->createConfig($input);

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

        $result = $this->JsonDetector->createConfig($input);

        self::assertEquals($expected, $result);
    }
}
