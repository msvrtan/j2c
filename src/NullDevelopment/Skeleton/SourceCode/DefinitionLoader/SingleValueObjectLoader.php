<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionLoader;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\SingleValueObject;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\ConstructorMethodFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\InterfaceNameCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\PropertyCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\TraitNameCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;

/**
 * @see SingleValueObjectLoaderSpec
 * @see SingleValueObjectLoaderTest
 */
class SingleValueObjectLoader implements DefinitionLoader
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
        if ('SingleValueObject' === $input['type']) {
            return true;
        }

        return false;
    }

    public function load(array $input): SingleValueObject
    {
        $data = array_merge($this->getDefaultValues(), $input);

        $parent            = $this->extractParent($data);
        $interfaces        = $this->interfaceNameCollectionFactory->create($data['interfaces']);
        $traits            = $this->traitNameCollectionFactory->create($data['traits']);
        $properties        = $this->propertyCollectionFactory->create($data['properties']);
        $constructorMethod = $this->constructorMethodFactory->create($data['constructor']);
        $methods           = [$constructorMethod];

        foreach ($properties as $property) {
            $methods[] = new GetterMethod('get'.ucfirst($property->getName()), $property);
        }

        return new SingleValueObject(
            ClassName::create($data['instanceOf']),
            $parent,
            $interfaces,
            $traits,
            $properties,
            $methods
        );
    }

    public function getDefaultValues(): array
    {
        return [
            'type'       => 'SingleValueObject',
            'instanceOf' => null,
            'parent'     => null,
            'interfaces' => [],
            'traits'     => [],
            'properties' => [],
            'methods'    => [],
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
