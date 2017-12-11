<?php

declare(strict_types=1);

namespace Tests\Miro\ExampleMaker;

use Miro\ExampleMaker\SimpleExample;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Miro\ExampleMaker\SimpleExample
 * @group  unit
 */
class SimpleExampleTest extends TestCase
{
    /** @dataProvider provideSimpleInputs */
    public function testToString($value, string $expectedStringOutput)
    {
        $example = new SimpleExample($value);

        self::assertEquals($expectedStringOutput, $example->__toString());
    }

    public function provideSimpleInputs(): array
    {
        return [
            [1, '1'],
            ['value', "'value'"],
            [1.0, '1.0'],
            [1, '1'],
        ];
    }
}
