<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class SpecNamespaceMiddleware implements PartialCodeGeneratorMiddleware
{
    /** @SuppressWarnings("PHPMD.UnusedFormalParameter") */
    public function execute($definition, callable $next)
    {
        return new PhpNamespace('spec\\'.$definition->getNamespace());
    }
}
