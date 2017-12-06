<?php

declare(strict_types=1);

namespace App\File;

use NullDevelopment\Skeleton\Php\ClassDefinition;

class FileResource
{
    /** @var string */
    private $fileName;
    /** @var ClassDefinition */
    private $classSource;

    public function __construct(string $fileName, ClassDefinition $classSource)
    {
        $this->fileName    = $fileName;
        $this->classSource = $classSource;
    }

    public function getClassSource(): ClassDefinition
    {
        return $this->classSource;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }
}
