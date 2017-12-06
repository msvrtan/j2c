<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Php\Structure;

interface StructureName
{
    const NAMESPACE_SEPARATOR = '\\';

    public function getName(): string;

    public function getNamespace(): ?string;

    public function getFullName(): string;
}
