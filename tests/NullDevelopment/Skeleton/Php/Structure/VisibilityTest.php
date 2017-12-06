<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\Php\Structure;

use NullDevelopment\Skeleton\Php\Structure\Visibility;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\Php\Structure\Visibility
 * @group  unit
 */
class VisibilityTest extends TestCase
{
    /**
     * @dataProvider provideValues
     */
    public function testValues(string $value)
    {
        self::assertInstanceOf(Visibility::class, new Visibility($value));
    }

    public function provideValues(): array
    {
        return [
            ['private'],
            ['protected'],
            ['public'],
        ];
    }
}
