<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Path;

class TestPsr4Path extends Psr4Path
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
