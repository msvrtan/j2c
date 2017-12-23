<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpSpec\Method\LetMethod;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\LetMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\MethodFactory\LetMethodFactory
 * @group  unit
 */
class LetMethodFactoryTest extends TestCase
{
    /** @var LetMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new LetMethodFactory();
    }

    /** @dataProvider provideConstructorMethods */
    public function testCreateFromConstructorMethod(ConstructorMethod $method)
    {
        self::assertInstanceOf(LetMethod::class, $this->sut->createFromConstructorMethod($method));
    }

    public function provideConstructorMethods(): array
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
            [new ConstructorMethod([])],
            [new ConstructorMethod([$firstName])],
        ];
    }
}
