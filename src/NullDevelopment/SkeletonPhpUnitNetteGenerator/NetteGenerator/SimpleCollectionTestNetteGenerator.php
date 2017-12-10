<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteGenerator;

use Miro\ExampleMaker\ExampleMaker;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\Php\Structure\SimpleVariable;
use NullDevelopment\Skeleton\Php\Structure\Visibility;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleCollection;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestMiddleware;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestNamespaceMiddleware;

/**
 * @see SimpleCollectionTestNetteGeneratorSpec
 * @see SimpleCollectionTestNetteGeneratorTest
 */
class SimpleCollectionTestNetteGenerator extends BaseNetteGenerator
{
    /** @var ExampleMaker */
    private $exampleMaker;

    public function __construct(ExampleMaker $exampleMaker)
    {
        $middleware = [
            new TestMiddleware(),
            new TestNamespaceMiddleware(),
        ];
        parent::__construct($middleware);

        $this->exampleMaker = $exampleMaker;
    }

    public function supports($definition): bool
    {
        if ($definition instanceof SimpleCollection) {
            return true;
        }

        return false;
    }

    public function generate(SimpleCollection $definition): PhpNamespace
    {
        $middlewareChain = $this->middlewareChain;
        $namespace       = $middlewareChain($definition);

        /** @var ClassType $class */
        foreach ($namespace->getClasses() as $class) {
            $var = new SimpleVariable('zzz', $definition->getCollectionOf()->getClassName());

            $class->addMethod('setUp')
                ->setVisibility(Visibility::PUBLIC)
                ->addBody(sprintf('$this->elements = [%s];', $this->exampleMaker->instance($var)))
                ->addBody(sprintf('$this->sut = new %s(%s);', $definition->getClassName(), '$this->elements'));

            $class->addMethod('testGetElements')
                ->addBody('self::assertSame($this->elements, $this->sut->toArray());');

            $class->addMethod('testSerializeAndDeserialize')
                ->addBody('$serialized = $this->sut->serialize();')
                ->addBody('$serializedJson = json_encode($serialized);')
                ->addBody('self::assertEquals($this->sut, $this->sut->deserialize(json_decode($serializedJson, true)));');
        }

        return $namespace;
    }
}
