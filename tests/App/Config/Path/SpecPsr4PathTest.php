<?php

declare(strict_types=1);

namespace Tests\App\Config\Path;

use App\Config\Path\SpecPsr4Path;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Config\Path\SpecPsr4Path
 * @group  unit
 */
class SpecPsr4PathTest extends TestCase
{
    /** @var SpecPsr4Path */
    private $path;

    public function setUp(): void
    {
        $this->path = new SpecPsr4Path('spec/', 'spec\\');
    }

    public function testItIsSpecCode(): void
    {
        self::assertTrue($this->path->isSpecCode());
        self::assertFalse($this->path->isSourceCode());
        self::assertFalse($this->path->isTestsCode());
    }
}
