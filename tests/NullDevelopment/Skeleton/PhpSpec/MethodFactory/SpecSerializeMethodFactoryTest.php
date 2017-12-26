<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecSerializeMethod;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\SpecSerializeMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\SerializeMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\MethodFactory\SpecSerializeMethodFactory
 * @group  unit
 */
class SpecSerializeMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SpecSerializeMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new SpecSerializeMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    /** @dataProvider provideSerializeMethods */
    public function testCreateFromSerializeMethod(SerializeMethod $method)
    {
        self::assertInstanceOf(SpecSerializeMethod::class, $this->sut->createFromSerializeMethod($method));
    }

    public function provideSerializeMethods(): array
    {
        $className = ClassName::create('MyVendor\\UserEntity');
        $firstName = new Property(
            'firstName',
            ClassName::create('MyVendor\\User\\UserFirstName'),
            false,
            false,
            false,
            new Visibility('private')
        );

        return [
            [new SerializeMethod($className, [$firstName])],
        ];
    }
}
