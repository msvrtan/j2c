<?php

declare(strict_types=1);

namespace Tests\App\Config\Path\Readers;

use App\Config\Path\Readers\SourceCodePathReader;
use Tests\TestCase\SfTestCase;

/**
 * @covers \App\Config\Path\Readers\SourceCodePathReader
 * @group  integration
 */
class SourceCodePathReaderTest extends SfTestCase
{
    /** @var SourceCodePathReader */
    private $reader;

    public function setUp()
    {
        parent::setUp();

        $this->reader = $this->getService(SourceCodePathReader::class);
    }

    public function testGetExistingSourceCodeNamespaces()
    {
        $data = $this->reader->getExistingSourceCodeNamespaces();

        self::assertTrue(is_array($data));
    }

    public function testGetExistingSourceCodeClassNames()
    {
        $data = $this->reader->getExistingSourceCodeClassNames();

        self::assertTrue(is_array($data));
    }
}
