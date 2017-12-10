<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Php\Structure;

/**
 * @see MethodParameterSpec
 * @see MethodParameterTest
 */
class SimpleVariable implements Variable
{
    /** @var string */
    private $name;
    /** @var StructureName */
    private $structureName;

    public function __construct(string $name, StructureName $structureName)
    {
        $this->name          = $name;
        $this->structureName = $structureName;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStructureName(): StructureName
    {
        return $this->structureName;
    }

    public function getStructureFullName(): string
    {
        return $this->structureName->getFullName();
    }
}
