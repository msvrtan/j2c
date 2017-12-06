<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Php\Structure;

/**
 * @see InterfaceNameSpec
 * @see InterfaceNameTest
 */
class InterfaceName implements StructureName
{
    /** @var string */
    private $interfaceName;
    /** @var null|string */
    private $namespace;

    public function __construct(string $interfaceName, ?string $namespace = null)
    {
        $this->interfaceName = $interfaceName;
        $this->namespace     = $namespace;
    }

    public function getName(): string
    {
        return $this->interfaceName;
    }

    public function getNamespace(): ?string
    {
        return $this->namespace;
    }

    public function getFullName(): string
    {
        if (true === empty($this->namespace)) {
            return $this->interfaceName;
        }

        return $this->namespace.'\\'.$this->interfaceName;
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
