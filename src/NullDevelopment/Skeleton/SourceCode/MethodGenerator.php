<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode;

interface MethodGenerator
{
    public function supports(Method $method): bool;

    public function generate(Method $method): string;
}
