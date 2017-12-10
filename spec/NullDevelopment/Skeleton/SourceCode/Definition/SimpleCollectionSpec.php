<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\Definition;

use NullDevelopment\Skeleton\Core\SourceCode\Definition\SourceCode;
use NullDevelopment\Skeleton\Php\ClassDefinition;
use NullDevelopment\Skeleton\Php\Method\ConstructorMethod;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\Php\Structure\CollectionOf;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleCollection;
use PhpSpec\ObjectBehavior;

class SimpleCollectionSpec extends ObjectBehavior
{
    public function let(ClassName $name, ConstructorMethod $constructorMethod, CollectionOf $collectionOf)
    {
        $this->beConstructedWith($name, null, [], [], $constructorMethod, [], $collectionOf);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleCollection::class);
        $this->shouldHaveType(ClassDefinition::class);
        $this->shouldImplement(SourceCode::class);
    }
}
