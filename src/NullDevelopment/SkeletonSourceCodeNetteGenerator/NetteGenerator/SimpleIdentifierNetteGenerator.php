<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleIdentifier;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware\CastableToStringMiddleware;
use NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware\ClassMiddleware;
use NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware\ConstructorMiddleware;
use NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware\NamespaceMiddleware;
use NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware\SerializationMiddleware;

/**
 * @see SimpleIdentifierNetteGeneratorSpec
 * @see SimpleIdentifierNetteGeneratorTest
 */
class SimpleIdentifierNetteGenerator extends BaseNetteGenerator
{
    public function __construct()
    {
        $middleware = [
            new SerializationMiddleware(),
            new CastableToStringMiddleware(),
            new ConstructorMiddleware(),
            new ClassMiddleware(),
            new NamespaceMiddleware(),
        ];
        parent::__construct($middleware);
    }

    public function supports($definition): bool
    {
        if ($definition instanceof SimpleIdentifier) {
            return true;
        }

        return false;
    }

    public function handleSimpleIdentifier(SimpleIdentifier $definition): array
    {
        return [$this->generate($definition)];
    }

    public function generate(SimpleIdentifier $definition): PhpNamespace
    {
        $middlewareChain = $this->middlewareChain;
        $namespace       = $middlewareChain($definition);

        return $namespace;
    }
}
