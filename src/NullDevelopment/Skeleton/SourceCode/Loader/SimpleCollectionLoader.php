<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\Loader;

use NullDevelopment\Skeleton\Core\Loader\ConstructorMethodLoader;
use NullDevelopment\Skeleton\Core\Loader\InterfaceLoader;
use NullDevelopment\Skeleton\Core\Loader\PropertyLoader;
use NullDevelopment\Skeleton\Core\Loader\TraitLoader;
use NullDevelopment\Skeleton\Core\ObjectConfigurationLoader;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\Php\Structure\CollectionOf;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleCollection;

/**
 * @see SimpleCollectionLoaderSpec
 * @see SimpleCollectionLoaderTest
 */
class SimpleCollectionLoader implements ObjectConfigurationLoader
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
        if ('SimpleCollection' === $input['type']) {
            return true;
        }

        return false;
    }

    public function load(array $input): SimpleCollection
    {
        $data = array_merge($this->getDefaultValues(), $input);

        $parent            = $this->extractParent($data);
        $interfaces        = $this->interfaceLoader->load($data['interfaces']);
        $traits            = $this->traitLoader->load($data['traits']);
        $constructorMethod = $this->constructorMethodLoader->load($data['constructor']);
        $properties        = $this->propertyLoader->load($data['constructor']);
        $collectionOf      = new CollectionOf(
            ClassName::createFromFullyQualified($data['collectionOf']['className']),
            $data['collectionOf']['accessor'],
            ClassName::createFromFullyQualified($data['collectionOf']['has'])
        );

        return new SimpleCollection(
            ClassName::createFromFullyQualified($data['className']),
            $parent,
            $interfaces,
            $traits,
            $constructorMethod,
            $properties,
            $collectionOf
        );
    }

    public function getDefaultValues(): array
    {
        return [
            'type'        => 'SimpleCollection',
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
