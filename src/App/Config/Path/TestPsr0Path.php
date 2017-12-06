<?php

declare(strict_types=1);

namespace App\Config\Path;

class TestPsr0Path extends Psr0Path
{
    public function isSourceCode(): bool
    {
        return false;
    }

    public function isSpecCode(): bool
    {
        return false;
    }

    public function isTestsCode(): bool
    {
        return true;
    }
}
