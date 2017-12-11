<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleEntity;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\LetMiddleware;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecGetterMiddleware;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecMiddleware;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecNamespaceMiddleware;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecSerializationMiddleware;

/**
 * @see SimpleEntitySpecNetteGeneratorSpec
 * @see SimpleEntitySpecNetteGeneratorTest
 */
class SimpleEntitySpecNetteGenerator extends BaseNetteGenerator
{
    public function __construct()
    {
        $middleware = [
            new SpecSerializationMiddleware(new ExampleMaker()),
            new SpecGetterMiddleware(new ExampleMaker()),
            new LetMiddleware(new ExampleMaker()),
            new SpecMiddleware(),
            new SpecNamespaceMiddleware(),
        ];
        parent::__construct($middleware);
    }

    public function supports($definition): bool
    {
        if ($definition instanceof SimpleEntity) {
            return true;
        }

        return false;
    }

    public function generate(SimpleEntity $definition): PhpNamespace
    {
        $middlewareChain = $this->middlewareChain;
        $namespace       = $middlewareChain($definition);

        return $namespace;
    }
}
