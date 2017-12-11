<?php

declare(strict_types=1);

namespace Tests\Miro\ExampleMaker;

use Miro\ExampleMaker\InstanceExample;
use Miro\ExampleMaker\SimpleExample;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\Php\Structure\StructureName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Miro\ExampleMaker\InstanceExample
 * @group  unit
 */
class InstanceExampleTest extends TestCase
{
    /** @dataProvider provideSimpleInputs */
    public function testToString(StructureName $instanceOf, array $parameters, string $expectedStringOutput)
    {
        $example = new InstanceExample($instanceOf, $parameters);

        self::assertEquals($expectedStringOutput, $example->__toString());
    }

    public function provideSimpleInputs(): array
    {
        return [
            [new ClassName('DateTime'), [new SimpleExample('2018-01-01 00:01:00')], "new DateTime('2018-01-01 00:01:00')"],
        ];
    }
}
