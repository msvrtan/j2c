<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleValueObject;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\LetMiddleware;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecGetterMiddleware;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecMiddleware;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecNamespaceMiddleware;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecSerializationMiddleware;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecToStringMiddleware;

/**
 * @see SimpleValueObjectSpecNetteGeneratorSpec
 * @see SimpleValueObjectSpecNetteGeneratorTest
 */
class SimpleValueObjectSpecNetteGenerator extends BaseNetteGenerator
{
    public function __construct()
    {
        $middleware = [
            new SpecSerializationMiddleware(new ExampleMaker()),
            new SpecToStringMiddleware(new ExampleMaker()),
            new SpecGetterMiddleware(new ExampleMaker()),
            new LetMiddleware(new ExampleMaker()),
            new SpecMiddleware(),
            new SpecNamespaceMiddleware(),
        ];
        parent::__construct($middleware);
    }

    public function supports($definition): bool
    {
        if ($definition instanceof SimpleValueObject) {
            return true;
        }

        return false;
    }

    public function generate(SimpleValueObject $definition): PhpNamespace
    {
        $middlewareChain = $this->middlewareChain;
        $namespace       = $middlewareChain($definition);

        return $namespace;
    }
}
