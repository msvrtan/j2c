<?php

declare(strict_types=1);

namespace App\File;

use App\Config\Config;
use Exception;
use NullDevelopment\Skeleton\Php\ClassDefinition;
use NullDevelopment\Skeleton\Php\Structure\ClassName;

class FileFactory
{
    /** @var Config */
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function create(ClassDefinition $classSource): FileResource
    {
        return new FileResource($this->getPath($classSource->getName()), $classSource);
    }

    protected function getPathItBelongsTo(ClassName $className)
    {
        foreach ($this->config->getPaths() as $path) {
            if ($path->belongsTo($className->getFullName())) {
                return $path;
            }
        }

        throw new Exception('Err 912123132: Cant find path that "'.$className->getFullName().'" would belong to!');
    }

    public function getPath(ClassName $className)
    {
        return $this->getPathItBelongsTo($className)->getFileNameFor($className->getFullName());
    }

    public function createOutputResource(ClassDefinition $classSource, string $output): OutputResource
    {
        return new OutputResource($this->getPath($classSource->getName()), $classSource, $output);
    }
}
