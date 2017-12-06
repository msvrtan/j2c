<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleIdentifier;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\SetUpMiddleware;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestGetterMiddleware;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestMiddleware;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestNamespaceMiddleware;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestSerializationMiddleware;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestToStringMiddleware;

/**
 * @see SimpleIdentifierTestNetteGeneratorSpec
 * @see SimpleIdentifierTestNetteGeneratorTest
 */
class SimpleIdentifierTestNetteGenerator extends BaseNetteGenerator
{
    public function __construct()
    {
        $middleware = [
            new TestSerializationMiddleware(),
            new TestToStringMiddleware(),
            new TestGetterMiddleware(),
            new SetUpMiddleware(),
            new TestMiddleware(),
            new TestNamespaceMiddleware(),
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
