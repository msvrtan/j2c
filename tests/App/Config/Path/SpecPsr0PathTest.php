<?php

declare(strict_types=1);

namespace Tests\App\Config\Path;

use App\Config\Path\SpecPsr0Path;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Config\Path\SpecPsr0Path
 * @group  unit
 */
class SpecPsr0PathTest extends TestCase
{
    /** @var SpecPsr0Path */
    private $path;

    public function setUp(): void
    {
        $this->path = new SpecPsr0Path('spec/', '');
    }

    public function testItIsSpecCode(): void
    {
        self::assertTrue($this->path->isSpecCode());
        self::assertFalse($this->path->isSourceCode());
        self::assertFalse($this->path->isTestsCode());
    }
}
