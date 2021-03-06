<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\MethodGenerator;

use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\PhpUnit\Method\TestDateTimeToStringMethod;
use NullDevelopment\Skeleton\PhpUnit\MethodGenerator\TestDateTimeToStringMethodGenerator;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator;
use PhpSpec\ObjectBehavior;

class TestDateTimeToStringMethodGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith($exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestDateTimeToStringMethodGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }

    public function it_creates_test_to_string_method_for_object_properties(TestDateTimeToStringMethod $method)
    {
        $method->getName()->shouldBeCalled()->willReturn('testToString');
        $method->getVisibility()->shouldBeCalled()->willReturn(new Visibility('public'));
        $method->getReturnType()->shouldBeCalled()->willReturn('');

        $lines = [
            'public function testToString()',
            '{',
            "\t".'self::assertSame(\'2018-01-01T11:22:33+00:00\', $this->sut->__toString());',
            '}',
        ];

        $expected = implode(PHP_EOL, $lines);

        $this->generateAsString($method)->shouldReturn($expected);
    }
}
