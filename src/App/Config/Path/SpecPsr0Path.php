<?php

declare(strict_types=1);

namespace App\Config\Path;

class SpecPsr0Path extends Psr0Path
{
    public function isSourceCode(): bool
    {
        return false;
    }

    public function isSpecCode(): bool
    {
        return true;
    }

    public function isTestsCode(): bool
    {
        return false;
    }
}
