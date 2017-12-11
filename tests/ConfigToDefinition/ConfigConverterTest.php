<?php

declare(strict_types=1);

namespace Tests\ConfigToDefinition;

use ConfigToDefinition\ConfigConverter;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\Php\Method\ConstructorMethod;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\Php\Structure\MethodParameter;
use NullDevelopment\Skeleton\Php\Structure\Property;
use NullDevelopment\Skeleton\SourceCode\Definition\DateTimeValueObject;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleEntity;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleIdentifier;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleValueObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \ConfigToDefinition\ConfigConverter
 * @group  unit
 */
class ConfigConverterTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ConfigConverter */
    private $sut;

    public function setUp()
    {
        $this->sut = new ConfigConverter();
    }

    public function testWithoutFields()
    {
        $input = [
            'name'      => 'User',
            'namespace' => 'MyVendor',
            'fields'    => [],
        ];

        $definition = $this->sut->convert($input);

        $expected = [new SimpleEntity(new ClassName('User', 'MyVendor'), null, [], [], null, [])];

        self::assertEquals($expected, $definition);
    }

    public function testWithIdentifierOnly()
    {
        $input = [
            'name'      => 'User',
            'namespace' => 'MyVendor',
            'fields'    => [
                'id' => [
                    'name'        => 'UserId',
                    'namespace'   => 'MyVendor\User',
                    'suggestions' => [
                        'JsonToConfig\JsonDetector\ValueObject\Id\IntegerId',
                        'JsonToConfig\JsonDetector\ValueObject\Simple\SimpleInteger',
                    ],
                ],
            ],
        ];

        $definition = $this->sut->convert($input);

        $expected = [
            new SimpleEntity(
                new ClassName('User', 'MyVendor'),
                null,
                [],
                [],
                new ConstructorMethod([new MethodParameter('id', new ClassName('UserId', 'MyVendor\User'))]),
                [Property::privateProperty('id', new ClassName('UserId', 'MyVendor\User'))]
            ),
            new SimpleIdentifier(
                new ClassName('UserId', 'MyVendor\\User'),
                null,
                [],
                [],
                new ConstructorMethod([new MethodParameter('id', new ClassName('int'))]),
                [Property::privateProperty('id', new ClassName('int'))]
            ),
        ];

        self::assertEquals($expected, $definition);
    }

    public function testUser()
    {
        $input = [
            'name'      => 'User',
            'namespace' => 'MyVendor',
            'fields'    => [
                'id' => [
                    'name'        => 'UserId',
                    'namespace'   => 'MyVendor\User',
                    'suggestions' => [
                        'JsonToConfig\JsonDetector\ValueObject\Id\IntegerId',
                        'JsonToConfig\JsonDetector\ValueObject\Simple\SimpleInteger',
                    ],
                ],
                'full_name'  => [
                    'key'         => 'full_name',
                    'name'        => 'UserFullName',
                    'namespace'   => 'MyVendor\User',
                    'suggestions' => ['JsonToConfig\JsonDetector\ValueObject\Simple\SimpleString'],
                ],
                'name'       => [
                    'key'         => 'name',
                    'name'        => 'UserName',
                    'namespace'   => 'MyVendor\User',
                    'suggestions' => ['JsonToConfig\JsonDetector\ValueObject\Simple\SimpleString'],
                ],
                'created_at' => [
                    'key'         => 'created_at',
                    'name'        => 'UserCreatedAt',
                    'namespace'   => 'MyVendor\User',
                    'suggestions' => [
                        'JsonToConfig\JsonDetector\ValueObject\Simple\SimpleDateTime',
                        'JsonToConfig\JsonDetector\ValueObject\Simple\SimpleString',
                    ],
                ],
            ],
        ];

        $definition = $this->sut->convert($input);

        $expected = [
            new SimpleEntity(
                new ClassName('User', 'MyVendor'),
                null,
                [],
                [],
                new ConstructorMethod([
                    new MethodParameter('id', new ClassName('UserId', 'MyVendor\User')),
                    new MethodParameter('fullName', new ClassName('UserFullName', 'MyVendor\User')),
                    new MethodParameter('name', new ClassName('UserName', 'MyVendor\User')),
                    new MethodParameter('createdAt', new ClassName('UserCreatedAt', 'MyVendor\User')),
                ]),
                [
                    Property::privateProperty('id', new ClassName('UserId', 'MyVendor\User')),
                    Property::privateProperty('fullName', new ClassName('UserFullName', 'MyVendor\User')),
                    Property::privateProperty('name', new ClassName('UserName', 'MyVendor\User')),
                    Property::privateProperty('createdAt', new ClassName('UserCreatedAt', 'MyVendor\User')),
                ]
            ),
            new SimpleIdentifier(
                new ClassName('UserId', 'MyVendor\\User'),
                null,
                [],
                [],
                new ConstructorMethod([new MethodParameter('id', new ClassName('int'))]),
                [Property::privateProperty('id', new ClassName('int'))]
            ),
            new SimpleValueObject(
                new ClassName('UserFullName', 'MyVendor\\User'),
                null,
                [],
                [],
                new ConstructorMethod([new MethodParameter('userFullName', new ClassName('string'))]),
                [Property::privateProperty('userFullName', new ClassName('string'))]
            ),
            new SimpleValueObject(
                new ClassName('UserName', 'MyVendor\\User'),
                null,
                [],
                [],
                new ConstructorMethod([new MethodParameter('userName', new ClassName('string'))]),
                [Property::privateProperty('userName', new ClassName('string'))]
            ),
            new DateTimeValueObject(
                new ClassName('UserCreatedAt', 'MyVendor\\User'),
                new ClassName('DateTime'),
                [],
                [],
                new ConstructorMethod([new MethodParameter('value', new ClassName('string'))]),
                [Property::privateProperty('value', new ClassName('string'))]
            ),
        ];

        self::assertEquals($expected, $definition);
    }
}
