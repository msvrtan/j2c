<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Php\Structure;

/**
 * @see MethodParameterSpec
 * @see MethodParameterTest
 */
class MethodParameter implements Variable
{
    /** @var string */
    private $name;
    /** @var ClassName */
    private $className;
    /** @var bool */
    private $nullable;
    /** @var bool */
    private $hasDefaultValue;
    /** @var mixed */
    private $defaultValue;

    public function __construct(
        string $name,
        ClassName $className,
        bool $nullable = false,
        bool $hasDefaultValue = false,
        $defaultValue = null
    ) {
        $this->name            = $name;
        $this->className       = $className;
        $this->nullable        = $nullable;
        $this->hasDefaultValue = $hasDefaultValue;
        $this->defaultValue    = $defaultValue;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStructureName(): StructureName
    {
        return $this->className;
    }

    public function getStructureFullName(): string
    {
        return $this->className->getFullName();
    }

    public function isNullable(): bool
    {
        return $this->nullable;
    }

    public function hasDefaultValue(): bool
    {
        return $this->hasDefaultValue;
    }

    public function getDefaultValue()
    {
        return $this->defaultValue;
    }
}
