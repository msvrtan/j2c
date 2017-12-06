<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Php\Structure;

/**
 * @see TraitNameSpec
 * @see TraitNameTest
 */
class TraitName implements StructureName
{
    /** @var string */
    private $traitName;
    /** @var null|string */
    private $namespace;

    public function __construct(string $traitName, ?string $namespace = null)
    {
        $this->traitName = $traitName;
        $this->namespace = $namespace;
    }

    public function getName(): string
    {
        return $this->traitName;
    }

    public function getNamespace(): ?string
    {
        return $this->namespace;
    }

    public function getFullName(): string
    {
        if (true === empty($this->namespace)) {
            return $this->traitName;
        }

        return $this->namespace.'\\'.$this->traitName;
    }

    public static function createFromFullyQualified(string $fullName)
    {
        $parts = explode(self::NAMESPACE_SEPARATOR, $fullName);
        $name  = array_pop($parts);

        $namespace = null;

        if (count($parts) > 0) {
            $namespace = implode(self::NAMESPACE_SEPARATOR, $parts);
        }

        return new static($name, $namespace);
    }
}
