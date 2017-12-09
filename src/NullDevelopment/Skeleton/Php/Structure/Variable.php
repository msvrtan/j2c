<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Php\Structure;

/**
 * @see MethodParameterSpec
 * @see MethodParameterTest
 */
interface Variable
{
    public function getName(): string;

    public function getStructureName(): StructureName;

    public function getStructureFullName(): string;
}
