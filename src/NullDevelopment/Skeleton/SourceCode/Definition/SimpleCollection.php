<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\Definition;

use NullDevelopment\Skeleton\Core\SourceCode\Definition\SourceCode;
use NullDevelopment\Skeleton\Php\ClassDefinition;
use NullDevelopment\Skeleton\Php\Method\ConstructorMethod;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\Php\Structure\CollectionOf;

/**
 * @see SimpleCollectionSpec
 * @see SimpleCollectionTest
 */
class SimpleCollection extends ClassDefinition implements SourceCode
{
    /**
     * @var CollectionOf
     */
    private $collectionOf;

    public function __construct(
        ClassName $name,
        ?ClassName $parent,
        array $interfaces,
        array $traits,
        ?ConstructorMethod $constructorMethod,
        array $properties,
        CollectionOf $collectionOf
    ) {
        parent::__construct($name, $parent, $interfaces, $traits, $constructorMethod, $properties);
        $this->collectionOf = $collectionOf;
    }

    public function getCollectionOf(): CollectionOf
    {
        return $this->collectionOf;
    }

    public function toArray(): array
    {
        $data= parent::toArray();

        $data['definition']['collectionOf']=[
            'className' => $this->collectionOf->getClassName()->getFullName(),
            'accessor'  => $this->collectionOf->getAccessor(),
            'has'       => $this->collectionOf->getHas()->getFullName(),
        ];

        return $data;
    }
}
