<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Php\Structure;

/**
 * @see ClassNameSpec
 * @see ClassNameTest
 */
class ClassName implements StructureName
{
    /** @var string */
    private $className;
    /** @var null|string */
    private $namespace;

    public function __construct(string $className, ?string $namespace = null)
    {
        $this->className = $className;
        $this->namespace = $namespace;
    }

    public function getName(): string
    {
        return $this->className;
    }

    public function getNamespace(): ?string
    {
        return $this->namespace;
    }

    public function getFullName(): string
    {
        if (true === empty($this->namespace)) {
            return $this->className;
        }

        return $this->namespace.'\\'.$this->className;
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
