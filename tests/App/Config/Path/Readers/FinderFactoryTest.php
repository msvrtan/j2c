<?php

declare(strict_types=1);

namespace Tests\App\Config\Path\Readers;

use App\Config\Path\Readers\FinderFactory;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Finder\Finder;

/**
 * @covers \App\Config\Path\Readers\FinderFactory
 * @group  unit
 */
class FinderFactoryTest extends TestCase
{
    public function testCreate()
    {
        $factory = new FinderFactory();

        self::assertInstanceOf(Finder::class, $factory->create());
    }
}
