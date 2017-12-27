<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\PhpUnit\Method\TestToStringMethod;
use NullDevelopment\Skeleton\PhpUnit\MethodGenerator\TestToStringMethodGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\MethodGenerator\TestToStringMethodGenerator
 * @group  unit
 */
class TestToStringMethodGeneratorTest extends TestCase
{
    /** @var ExampleMaker */
    private $exampleMaker;
    /** @var TestToStringMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->exampleMaker = new ExampleMaker();
        $this->sut          = new TestToStringMethodGenerator($this->exampleMaker);
    }

    /** @dataProvider provideMethods */
    public function testSupports(TestToStringMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(TestToStringMethod $method, string $fileName)
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
        $firstName = new Property(
            'username',
            ClassName::create('MyVendor\\User\\Username'),
            false,
            false,
            false,
            new Visibility('private')
        );

        return [
            [new TestToStringMethod($firstName), 'it_is_castable_to_string.output'],
        ];
    }
}
