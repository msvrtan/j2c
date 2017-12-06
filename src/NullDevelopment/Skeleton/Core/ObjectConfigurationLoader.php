<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Core;

interface ObjectConfigurationLoader extends ConfigurationLoader
{
    public function supports(array $input): bool;
}
