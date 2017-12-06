<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Core;

use NullDevelopment\Skeleton\Php\ClassDefinition;
use Webmozart\Assert\Assert;

class ObjectConfigurationLoaderCollection
{
    /** @var array */
    private $loaders;

    public function __construct(array $loaders = [])
    {
        Assert::allIsInstanceOf($loaders, ObjectConfigurationLoader::class);
        $this->loaders = $loaders;
    }

    public function getLoaders(): array
    {
        return $this->loaders;
    }

    public function findAndLoad(array $config): ClassDefinition
    {
        foreach ($this->loaders as $loader) {
            if (true === $loader->supports($config)) {
                return $loader->load($config);
            }
        }
    }
}
