<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Core\Loader;

use NullDevelopment\Skeleton\Core\ConfigurationLoader;
use NullDevelopment\Skeleton\Php\Structure\InterfaceName;

/**
 * @see InterfaceLoaderSpec
 * @see InterfaceLoaderTest
 */
class InterfaceLoader implements ConfigurationLoader
{
    public function load(array $input): array
    {
        $interfaces = [];

        foreach ($input as $interfaceName) {
            $interfaces[] = InterfaceName::createFromFullyQualified($interfaceName);
        }

        return $interfaces;
    }
}
