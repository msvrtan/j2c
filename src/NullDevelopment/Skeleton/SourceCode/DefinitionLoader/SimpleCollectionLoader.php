<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionLoader;

use NullDevelopment\PhpStructure\CustomType\CollectionOf;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleCollection;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\ConstructorMethodFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\InterfaceNameCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\PropertyCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\TraitNameCollectionFactory;

/**
 * @see SimpleCollectionLoaderSpec
 * @see SimpleCollectionLoaderTest
 */
class SimpleCollectionLoader implements DefinitionLoader
{
    /** @var InterfaceNameCollectionFactory */
    private $interfaceNameCollectionFactory;
    /** @var TraitNameCollectionFactory */
    private $traitNameCollectionFactory;
    /** @var ConstructorMethodFactory */
    private $constructorMethodFactory;
    /** @var PropertyCollectionFactory */
    private $propertyCollectionFactory;

    public function __construct(
        InterfaceNameCollectionFactory $interfaceNameCollectionFactory,
        TraitNameCollectionFactory $traitNameCollectionFactory,
        ConstructorMethodFactory $constructorMethodFactory,
        PropertyCollectionFactory $propertyCollectionFactory
    ) {
        $this->interfaceNameCollectionFactory = $interfaceNameCollectionFactory;
        $this->traitNameCollectionFactory     = $traitNameCollectionFactory;
        $this->constructorMethodFactory       = $constructorMethodFactory;
        $this->propertyCollectionFactory      = $propertyCollectionFactory;
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

        $className         = ClassName::create($data['instanceOf']);
        $parent            = $this->extractParent($data);
        $interfaces        = $this->interfaceNameCollectionFactory->create($data['interfaces']);
        $traits            = $this->traitNameCollectionFactory->create($data['traits']);
        $properties        = $this->propertyCollectionFactory->create(array_merge($data['properties'], $data['constructor']));
        $constructorMethod = $this->constructorMethodFactory->create($data['constructor']);
        $methods           = [$constructorMethod];

        $collectionOf      = new CollectionOf(
            ClassName::create($data['collectionOf']['instanceOf']),
            $data['collectionOf']['accessor'],
            ClassName::create($data['collectionOf']['has'])
        );

        return new SimpleCollection(
            $className,
            $parent,
            $interfaces,
            $traits,
            $properties,
            $methods,
            $collectionOf
        );
    }

    public function getDefaultValues(): array
    {
        return [
            'type'        => 'SimpleCollection',
            'instanceOf'  => null,
            'parent'      => null,
            'interfaces'  => [],
            'traits'      => [],
            'properties'  => [],
            'methods'     => [],
            'constructor' => [],
        ];
    }

    private function extractParent(array $data): ?ClassName
    {
        if (null === $data['parent']) {
            return null;
        }

        return ClassName::create($data['parent']);
    }
}
