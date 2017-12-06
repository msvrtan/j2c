<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\Loader;

use NullDevelopment\Skeleton\Core\Loader\ConstructorMethodLoader;
use NullDevelopment\Skeleton\Core\Loader\InterfaceLoader;
use NullDevelopment\Skeleton\Core\Loader\PropertyLoader;
use NullDevelopment\Skeleton\Core\Loader\TraitLoader;
use NullDevelopment\Skeleton\Core\ObjectConfigurationLoader;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleIdentifier;

/**
 * @see SimpleIdentifierLoaderSpec
 * @see SimpleIdentifierLoaderTest
 */
class SimpleIdentifierLoader implements ObjectConfigurationLoader
{
    /** @var InterfaceLoader */
    private $interfaceLoader;
    /** @var TraitLoader */
    private $traitLoader;
    /** @var ConstructorMethodLoader */
    private $constructorMethodLoader;
    /** @var PropertyLoader */
    private $propertyLoader;

    public function __construct(
        InterfaceLoader $interfaceLoader,
        TraitLoader $traitLoader,
        ConstructorMethodLoader $constructorMethodLoader,
        PropertyLoader $propertyLoader
    ) {
        $this->interfaceLoader         = $interfaceLoader;
        $this->traitLoader             = $traitLoader;
        $this->constructorMethodLoader = $constructorMethodLoader;
        $this->propertyLoader          = $propertyLoader;
    }

    public function supports(array $input): bool
    {
        if ('SimpleIdentifier' === $input['type']) {
            return true;
        }

        return false;
    }

    public function load(array $input): SimpleIdentifier
    {
        $data = array_merge($this->getDefaultValues(), $input);

        $parent            = $this->extractParent($data);
        $interfaces        = $this->interfaceLoader->load($data['interfaces']);
        $traits            = $this->traitLoader->load($data['traits']);
        $constructorMethod = $this->constructorMethodLoader->load($data['constructor']);
        $properties        = $this->propertyLoader->load($data['constructor']);

        return new SimpleIdentifier(
            ClassName::createFromFullyQualified($data['className']),
            $parent,
            $interfaces,
            $traits,
            $constructorMethod,
            $properties
        );
    }

    public function getDefaultValues(): array
    {
        return [
            'type'        => 'SimpleIdentifier',
            'className'   => null,
            'parent'      => null,
            'interfaces'  => [],
            'traits'      => [],
            'constructor' => [],
            'properties'  => [],
        ];
    }

    private function extractParent(array $data): ?ClassName
    {
        if (null === $data['parent']) {
            return null;
        }

        return ClassName::createFromFullyQualified($data['parent']);
    }
}
