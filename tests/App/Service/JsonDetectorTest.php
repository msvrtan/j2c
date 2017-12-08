<?php

declare(strict_types=1);

namespace Tests\App\Service;

use App\Service\Config;
use App\Service\JsonDetector;
use App\Service\JsonDetector\Factory\ValueObject\Generix\EmailAddressValueObjectFactory;
use App\Service\JsonDetector\Factory\ValueObject\Generix\UrlValueObjectFactory;
use App\Service\JsonDetector\Factory\ValueObject\Id\IntegerIdValueObjectFactory;
use App\Service\JsonDetector\Factory\ValueObject\Id\UuidIdValueObjectFactory;
use App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleBoolValueObjectFactory;
use App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleCollectionFactory;
use App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleDateTimeValueObjectFactory;
use App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleFloatValueObjectFactory;
use App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleIntegerValueObjectFactory;
use App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleStringValueObjectFactory;
use App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleTimestampValueObjectFactory;
use App\Service\JsonDetector\ValueObject\Id\IntegerId;
use App\Service\JsonDetector\ValueObject\Simple\SimpleBool;
use App\Service\JsonDetector\ValueObject\Simple\SimpleDateTime;
use App\Service\JsonDetector\ValueObject\Simple\SimpleFloat;
use App\Service\JsonDetector\ValueObject\Simple\SimpleInteger;
use App\Service\JsonDetector\ValueObject\Simple\SimpleString;
use App\Service\JsonDetector\ValueObject\Simple\SimpleTimestamp;
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
                new SimpleDateTimeValueObjectFactory(),
                new SimpleTimestampValueObjectFactory(),
                new SimpleCollectionFactory(),
                new EmailAddressValueObjectFactory(),
                new UrlValueObjectFactory(),
                new IntegerIdValueObjectFactory(),
                new UuidIdValueObjectFactory(),
            ]
        );
    }

    public function testBool()
    {
        $config   = new Config('class', 'namespace', []);
        $input    = ['active' => true];
        $expected = new Config('class', 'namespace', ['active' => [new SimpleBool('active')]]);

        $result = $this->JsonDetector->detect($config, $input);

        self::assertEquals($expected, $result);
    }

    public function testFloat()
    {
        $config   = new Config('class', 'namespace', []);
        $input    = ['amount' => 1.8];
        $expected = new Config('class', 'namespace', ['amount' => [new SimpleFloat('amount')]]);

        $result = $this->JsonDetector->detect($config, $input);

        self::assertEquals($expected, $result);
    }

    public function testInteger()
    {
        $config   = new Config('class', 'namespace', []);
        $input    = ['number' => 1];
        $expected = new Config('class', 'namespace', ['number' => [new SimpleInteger('number')]]);

        $result = $this->JsonDetector->detect($config, $input);

        self::assertEquals($expected, $result);
    }

    public function testString()
    {
        $config   = new Config('class', 'namespace', []);
        $input    = ['first_name' => 'John'];
        $expected = new Config('class', 'namespace', ['first_name' => [new SimpleString('first_name')]]);

        $result = $this->JsonDetector->detect($config, $input);

        self::assertEquals($expected, $result);
    }

    public function testDateTime()
    {
        $config   = new Config('class', 'namespace', []);
        $input    = ['created_at' => '2017-02-03 21:22:23'];
        $expected = new Config('class', 'namespace', ['created_at' => [new SimpleDateTime('created_at'), new SimpleString('created_at')]]);

        $result = $this->JsonDetector->detect($config, $input);

        self::assertEquals($expected, $result);
    }

    public function testTimestamp()
    {
        $config   = new Config('class', 'namespace', []);
        $input    = ['created_at' => '1494069318'];
        $expected = new Config('class', 'namespace', ['created_at' => [new SimpleTimestamp('created_at'), new SimpleString('created_at')]]);

        $result = $this->JsonDetector->detect($config, $input);

        self::assertEquals($expected, $result);
    }

    public function testMultipleInputItems()
    {
        $config = new Config('class', 'namespace', []);
        $input  = [
            'first_name' => 'John',
            'active'     => true,
            'height'     => 1.8,
        ];
        $expected = new Config('class', 'namespace', [
            'first_name' => [new SimpleString('first_name')],
            'active'     => [new SimpleBool('active')],
            'height'     => [new SimpleFloat('height')],
        ]);

        $result = $this->JsonDetector->detect($config, $input);

        self::assertEquals($expected, $result);
    }

    public function testMultipleResults()
    {
        $config = new Config('class', 'namespace', []);
        $input  = [
            'someId' => 1,
        ];
        $expected = new Config('class', 'namespace', [
            'someId' => [
                new IntegerId('someId'),
                new SimpleInteger('someId'),
            ],
        ]);

        $result = $this->JsonDetector->detect($config, $input);

        self::assertEquals($expected, $result);
    }
}
