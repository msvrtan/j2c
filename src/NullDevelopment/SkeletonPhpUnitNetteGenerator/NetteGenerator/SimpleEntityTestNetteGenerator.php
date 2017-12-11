<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleEntity;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\SetUpMiddleware;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestGetterMiddleware;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestMiddleware;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestNamespaceMiddleware;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestSerializationMiddleware;

/**
 * @see SimpleEntityTestNetteGeneratorSpec
 * @see SimpleEntityTestNetteGeneratorTest
 */
class SimpleEntityTestNetteGenerator extends BaseNetteGenerator
{
    public function __construct()
    {
        $middleware = [
            new TestSerializationMiddleware(),
            new TestGetterMiddleware(),
            new SetUpMiddleware(new ExampleMaker()),
            new TestMiddleware(),
            new TestNamespaceMiddleware(),
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
