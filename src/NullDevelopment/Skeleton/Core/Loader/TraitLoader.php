<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Core\Loader;

use NullDevelopment\Skeleton\Core\ConfigurationLoader;
use NullDevelopment\Skeleton\Php\Structure\TraitName;

/**
 * @see TraitLoaderSpec
 * @see TraitLoaderTest
 */
class TraitLoader implements ConfigurationLoader
{
    public function load(array $input): array
    {
        $interfaces = [];

        foreach ($input as $interfaceName) {
            $interfaces[] = TraitName::createFromFullyQualified($interfaceName);
        }

        return $interfaces;
    }
}
