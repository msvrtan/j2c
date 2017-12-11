<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\Loader;

use Generator;
use NullDevelopment\Skeleton\Php\Method\ConstructorMethod;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\Php\Structure\Property;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleValueObject;
use NullDevelopment\Skeleton\SourceCode\Loader\SimpleValueObjectLoader;
use Tests\TestCase\SfTestCase;

/**
 * @group application
 */
class SimpleValueObjectLoaderTest extends SfTestCase
{
    /** @var SimpleValueObjectLoader */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SimpleValueObjectLoader::class);
    }

    /**
     * @dataProvider provideFullyDefinedInput
     * @dataProvider provideMinimallyDefinedInput
     */
    public function testLoader(array $inputConfig)
    {
        // Act
        $result = $this->sut->load($inputConfig);

        // Assert expected instance was returned
        self::assertInstanceOf(SimpleValueObject::class, $result);

        // Assert name
        self::assertEquals(ClassName::createFromFullyQualified('MyVendor\\User\\UserId'), $result->getName());

        // No parent
        self::assertFalse($result->hasParent());
        self::assertNull($result->getParent());

        // No interfaces
        self::assertFalse($result->hasInterfaces());
        self::assertEmpty($result->getInterfaces());

        // No traits
        self::assertFalse($result->hasTraits());
        self::assertEmpty($result->getTraits());

        // Has constructor
        self::assertTrue($result->hasConstructorMethod());
        self::assertInstanceOf(ConstructorMethod::class, $result->getConstructorMethod());

        // Has properties
        self::assertTrue($result->hasProperties());
        self::assertCount(1, $result->getProperties());
        self::assertContainsOnlyInstancesOf(Property::class, $result->getProperties());
    }

    public function provideFullyDefinedInput(): Generator
    {
        $input1 = [
            'type'        => 'SimpleValueObject',
            'className'   => 'MyVendor\\User\\UserId',
            'parent'      => null,
            'interfaces'  => [],
            'traits'      => [],
            'constructor' => [
                'id' => [
                    'className'  => 'integer',
                    'nullable'   => false,
                    'hasDefault' => false,
                    'default'    => null,
                ],
            ],
        ];

        yield [$input1];
    }

    public function provideMinimallyDefinedInput(): Generator
    {
        $input1 = [
            'type'        => 'SimpleValueObject',
            'className'   => 'MyVendor\\User\\UserId',
            'constructor' => [
                'id' => [
                    'className' => 'integer',
                ],
            ],
        ];

        yield [$input1];
    }

    /** @dataProvider provideInput */
    public function testSupports(array $input)
    {
        self::assertTrue($this->sut->supports($input));
    }

    /** @dataProvider provideInput */
    public function testLoad(array $input)
    {
        self::assertInstanceOf(SimpleValueObject::class, $this->sut->load($input));
    }

    /** @dataProvider provideInput */
    public function testToArrayOnDefinitionWorks(array $input)
    {
        $definition = $this->sut->load($input);

        self::assertEquals($input, $definition->toArray()['definition']);
    }

    public function provideInput(): array
    {
        return [
            [$this->loadDefinitionYaml('MyVendor/User/Username.yaml')],
            [$this->loadDefinitionYaml('MyVendor/Product/ProductWeight.yaml')],
        ];
    }
}
