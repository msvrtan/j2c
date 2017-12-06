<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Php\Structure;

use Exception;

/**
 * @see PropertySpec
 * @see PropertyTest
 */
class Property
{
    /** @var string */
    private $name;
    /** @var StructureName */
    private $structureName;
    /** @var bool */
    private $nullable;
    /** @var bool */
    private $hasDefaultValue;
    /** @var mixed */
    private $defaultValue;
    /** @var Visibility */
    private $visibility;
    /** @var bool */
    private $setter;
    /** @var bool */
    private $getter;

    public function __construct(
        string $name,
        StructureName $structureName,
        bool $nullable,
        bool $hasDefaultValue,
        $defaultValue,
        Visibility $visibility,
        bool $setter,
        bool $getter
    ) {
        $this->name            = $name;
        $this->structureName   = $structureName;
        $this->nullable        = $nullable;
        $this->hasDefaultValue = $hasDefaultValue;
        $this->defaultValue    = $defaultValue;
        $this->visibility      = $visibility;
        $this->setter          = $setter;
        $this->getter          = $getter;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStructureName(): StructureName
    {
        return $this->structureName;
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

    public function getVisibility(): Visibility
    {
        return $this->visibility;
    }

    public function isSetter(): bool
    {
        return $this->setter;
    }

    public function isGetter(): bool
    {
        return $this->getter;
    }

    public function suggestValue()
    {
        if ('string' === $this->getStructureName()->getFullName()) {
            return "'".$this->getName()."'";
        } elseif ('int' === $this->getStructureName()->getFullName()) {
            return 1;
        }

        throw new Exception('UNSUPPORTED SUGGEST VALUE');
    }
}
