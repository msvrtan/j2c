<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpSpec\Method\GetterSpecMethod;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\GetterSpecMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\MethodFactory\GetterSpecMethodFactory
 * @group  unit
 */
class GetterSpecMethodFactoryTest extends TestCase
{
    /** @var GetterSpecMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new GetterSpecMethodFactory();
    }

    /** @dataProvider provideGetterMethods */
    public function testCreateFromGetterMethod(GetterMethod $method)
    {
        self::assertInstanceOf(GetterSpecMethod::class, $this->sut->createFromGetterMethod($method));
    }

    public function provideGetterMethods(): array
    {
        $firstName = new Property(
            'firstName',
            ClassName::create('MyVendor\\User\\UserFirstName'),
            false,
            false,
            false,
            new Visibility('private')
        );

        return [
            [new GetterMethod('getFirstName', $firstName)],
        ];
    }
}
