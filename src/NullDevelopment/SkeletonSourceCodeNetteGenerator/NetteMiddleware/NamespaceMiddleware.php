<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class NamespaceMiddleware implements PartialCodeGeneratorMiddleware
{
    /** @SuppressWarnings("PHPMD.UnusedFormalParameter") */
    public function execute($definition, callable $next)
    {
        return new PhpNamespace((string) $definition->getNamespace());
    }
}
