<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\File;

use Exception;
use NullDevelopment\Nemesis\Config\Config;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;

class FileFactory
{
    /** @var Config */
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    protected function getPathItBelongsTo2(ClassName $className)
    {
        foreach ($this->config->getPaths() as $path) {
            if ($path->belongsTo($className->getFullName())) {
                return $path;
            }
        }

        throw new Exception('Err 235235235235235: Cant find path that "'.$className->getFullName().'" would belong to!');
    }

    public function getPath2(ClassName $className)
    {
        return $this->getPathItBelongsTo2($className)->getFileNameFor($className->getFullName());
    }
}
