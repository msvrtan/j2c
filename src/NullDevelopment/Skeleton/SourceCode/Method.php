<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;

interface Method
{
    public function getVisibility(): Visibility;

    public function getName(): string;

    /** @return Property[] */
    public function getParameters(): array;

    public function getReturnType(): string;

    public function isNullableReturnType(): bool;
}
