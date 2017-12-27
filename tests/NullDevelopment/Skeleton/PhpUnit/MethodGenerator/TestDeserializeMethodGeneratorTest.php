<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\PhpUnit\Method\TestDeserializeMethod;
use NullDevelopment\Skeleton\PhpUnit\MethodGenerator\TestDeserializeMethodGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\MethodGenerator\TestDeserializeMethodGenerator
 * @group  unit
 */
class TestDeserializeMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ExampleMaker */
    private $exampleMaker;
    /** @var TestDeserializeMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->exampleMaker = new ExampleMaker();
        $this->sut          = new TestDeserializeMethodGenerator($this->exampleMaker);
    }

    /** @dataProvider provideMethods */
    public function testSupports(TestDeserializeMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(TestDeserializeMethod $method, string $fileName)
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
        $className = ClassName::create('MyVendor\\User');
        $firstName = new Property(
            'username',
            ClassName::create('MyVendor\\User\\Username'),
            false,
            false,
            false,
            new Visibility('private')
        );

        return [
            [new TestDeserializeMethod($className, [$firstName]), 'it_can_be_deserialized.output'],
        ];
    }
}
