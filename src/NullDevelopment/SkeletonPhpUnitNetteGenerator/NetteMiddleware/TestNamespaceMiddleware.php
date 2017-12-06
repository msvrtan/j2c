<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class TestNamespaceMiddleware implements PartialCodeGeneratorMiddleware
{
    /** @SuppressWarnings("PHPMD.UnusedFormalParameter") */
    public function execute($definition, callable $next)
    {
        return new PhpNamespace('Tests\\'.$definition->getNamespace());
    }
}
