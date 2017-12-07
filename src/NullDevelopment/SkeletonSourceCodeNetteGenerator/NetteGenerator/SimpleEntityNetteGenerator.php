<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleEntity;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware\ClassMiddleware;
use NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware\ConstructorMiddleware;
use NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware\NamespaceMiddleware;
use NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware\SerializationMiddleware;

/**
 * @see SimpleEntityNetteGeneratorSpec
 * @see SimpleEntityNetteGeneratorTest
 */
class SimpleEntityNetteGenerator extends BaseNetteGenerator
{
    public function __construct()
    {
        $middleware = [
            new SerializationMiddleware(),
            new ConstructorMiddleware(),
            new ClassMiddleware(),
            new NamespaceMiddleware(),
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

    public function handleSimpleEntity(SimpleEntity $definition): array
    {
        return [$this->generate($definition)];
    }

    public function generate(SimpleEntity $definition): PhpNamespace
    {
        $middlewareChain = $this->middlewareChain;
        $namespace       = $middlewareChain($definition);

        return $namespace;
    }
}
