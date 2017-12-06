<?php

declare(strict_types=1);

namespace App\File;

use NullDevelopment\Skeleton\Php\ClassDefinition;

/**
 * @see OutputResourceSpec
 * @see OutputResourceTest
 */
class OutputResource
{
    /** @var string */
    private $fileName;
    /** @var ClassDefinition */
    private $classSource;
    /** @var string */
    private $output;

    public function __construct(string $fileName, ClassDefinition $classSource, string $output)
    {
        $this->fileName    = $fileName;
        $this->classSource = $classSource;
        $this->output      = $output;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function getClassSource(): ClassDefinition
    {
        return $this->classSource;
    }

    public function getOutput(): string
    {
        return $this->output;
    }
}
