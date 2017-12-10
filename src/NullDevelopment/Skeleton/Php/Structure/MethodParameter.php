<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Php\Structure;

use Exception;

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
        bool $nullable,
        bool $hasDefaultValue,
        $defaultValue
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

    public function suggestValue()
    {
        if ('string' === $this->getStructureFullName()) {
            return "'".$this->getName()."'";
        } elseif ('int' === $this->getStructureFullName()) {
            return 1;
        } elseif ('float' === $this->getStructureFullName()) {
            return 2.0;
        } elseif ('bool' === $this->getStructureFullName()) {
            return true;
        } elseif ('array' === $this->getStructureFullName()) {
            return ['data'];
        }

        return '$'.$this->getName();

        throw new Exception('UNSUPPORTED SUGGEST VALUE');
    }
}
