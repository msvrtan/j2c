<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Path;

interface Path
{
    public function isSourceCode(): bool;

    public function isSpecCode(): bool;

    public function isTestsCode(): bool;

    public function belongsTo(string $className): bool;

    public function getFileNameFor(string $className): string;

    public function getPathBase(): string;
}
