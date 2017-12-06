<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleIdentifier;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\LetMiddleware;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecGetterMiddleware;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecMiddleware;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecNamespaceMiddleware;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecSerializationMiddleware;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecToStringMiddleware;

/**
 * @see SimpleIdentifierSpecNetteGeneratorSpec
 * @see SimpleIdentifierSpecNetteGeneratorTest
 */
class SimpleIdentifierSpecNetteGenerator extends BaseNetteGenerator
{
    public function __construct()
    {
        $middleware = [
            new SpecSerializationMiddleware(),
            new SpecToStringMiddleware(),
            new SpecGetterMiddleware(),
            new LetMiddleware(),
            new SpecMiddleware(),
            new SpecNamespaceMiddleware(),
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

    public function generate(SimpleIdentifier $definition): PhpNamespace
    {
        $middlewareChain = $this->middlewareChain;
        $namespace       = $middlewareChain($definition);

        return $namespace;
    }
}
