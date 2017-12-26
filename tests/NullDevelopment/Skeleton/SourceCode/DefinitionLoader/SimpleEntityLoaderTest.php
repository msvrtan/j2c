<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionLoader;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleEntity;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\SimpleEntityLoader;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DeserializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use NullDevelopment\Skeleton\SourceCode\Method\SerializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\ToStringMethod;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionLoader\SimpleEntityLoader
 * @group  integration
 */
class SimpleEntityLoaderTest extends SfTestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SimpleEntityLoader */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SimpleEntityLoader::class);
    }

    /** @dataProvider provideInputs */
    public function testSupports(array $input)
    {
        self::assertTrue($this->sut->supports($input));
    }

    /** @dataProvider provideInputs */
    public function testLoad(array $input, SimpleEntity $expected)
    {
        self::assertEquals($expected, $this->sut->load($input));
    }

    public function testGetDefaultValues()
    {
        $expected = [
            'type'       => 'SimpleEntity',
            'instanceOf' => null,
            'parent'     => null,
            'interfaces' => [],
            'traits'     => [],
            'properties' => [],
            'methods'    => [],
            'constructor'=> [],
        ];

        $this->assertEquals($expected, $this->sut->getDefaultValues());
    }

    public function provideInputs(): array
    {
        $nameProperty  = new Property('name', ClassName::create('string'), false, false, null, new Visibility('private'));
        $idProperty    = new Property('id', ClassName::create('string'), false, false, null, new Visibility('private'));

        return [
            [
                [
                    'type'        => 'SimpleEntity',
                    'instanceOf'  => 'MyCompany\User\UserName',
                    'constructor' => ['name' => ['instanceOf' => 'string']],
                    'properties'  => [],
                ],
                new SimpleEntity(
                    ClassName::create('MyCompany\User\UserName'),
                    null,
                    [],
                    [],
                    [$nameProperty],
                    [
                        new ConstructorMethod([$nameProperty]),
                        new GetterMethod('getName', $nameProperty),
                        new GetterMethod('getId', $nameProperty),
                        new ToStringMethod($nameProperty),
                        new SerializeMethod(ClassName::create('MyCompany\User\UserName'), [$nameProperty]),
                        new DeserializeMethod(ClassName::create('MyCompany\User\UserName'), [$nameProperty]),
                    ]
                ),
            ],
            [
                [
                    'type'        => 'SimpleEntity',
                    'instanceOf'  => 'MyCompany\User\UserName',
                    'parent'      => null,
                    'interfaces'  => [],
                    'traits'      => [],
                    'constructor' => [
                        'name' => [
                            'instanceOf' => 'string',
                            'nullable'   => false,
                            'hasDefault' => false,
                            'default'    => null,
                        ],
                    ],
                    'properties' => ['name' => ['instanceOf' => 'string']],
                ],
                new SimpleEntity(
                    ClassName::create('MyCompany\User\UserName'),
                    null,
                    [],
                    [],
                    [$nameProperty],
                    [
                        new ConstructorMethod([$nameProperty]),
                        new GetterMethod('getName', $nameProperty),
                        new GetterMethod('getId', $nameProperty),
                        new ToStringMethod($nameProperty),
                        new SerializeMethod(ClassName::create('MyCompany\User\UserName'), [$nameProperty]),
                        new DeserializeMethod(ClassName::create('MyCompany\User\UserName'), [$nameProperty]),
                    ]
                ),
            ],
            [
                [
                    'type'        => 'SimpleEntity',
                    'instanceOf'  => 'MyCompany\User\UserName',
                    'parent'      => null,
                    'interfaces'  => [],
                    'traits'      => [],
                    'constructor' => ['id' => ['instanceOf' => 'string']],
                    'properties'  => [],
                ],
                new SimpleEntity(
                    ClassName::create('MyCompany\User\UserName'),
                    null,
                    [],
                    [],
                    [$idProperty],
                    [
                        new ConstructorMethod([$idProperty]),
                        new GetterMethod('getId', $idProperty),
                        new GetterMethod('getId', $idProperty),
                        new ToStringMethod($idProperty),
                        new SerializeMethod(ClassName::create('MyCompany\User\UserName'), [$idProperty]),
                        new DeserializeMethod(ClassName::create('MyCompany\User\UserName'), [$idProperty]),
                    ]
                ),
            ],
        ];
    }
}
