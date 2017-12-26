<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Method\SerializeMethod;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator\SerializeMethodGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\MethodGenerator\SerializeMethodGenerator
 * @group  unit
 */
class SerializeMethodGeneratorTest extends TestCase
{
    /** @var SerializeMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new SerializeMethodGenerator();
    }

    /** @dataProvider provideMethods */
    public function testSupports(SerializeMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(SerializeMethod $method, string $fileName)
    {
        $fileName = __DIR__.'/output/'.$fileName;
        $expected = @file_get_contents($fileName);

        $result = $this->sut->generateAsString($method);

        if (true === empty($expected)) {
            file_put_contents($fileName, $result);
            self::markTestSkipped('Generating output for '.$fileName);
        } else {
            self::assertEquals($expected, $result);
        }
    }

    public function provideMethods(): array
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
        $name = new Property(
            'name',
            ClassName::create('string'),
            false,
            false,
            false,
            new Visibility('private')
        );

        return [
            [new SerializeMethod($className, [$firstName]), 'serialize.first_name.output'],
            [new SerializeMethod($className, [$name]), 'serialize.string.output'],
        ];
    }
}