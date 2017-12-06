<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Core;

interface ConfigurationLoader
{
    public function load(array $input);
}
