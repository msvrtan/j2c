<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class ClassMiddleware implements PartialCodeGeneratorMiddleware
{
    public function execute($definition, callable $next)
    {
        /** @var PhpNamespace $namespace */
        $namespace = $next($definition);

        $class = $namespace->addClass($definition->getClassName());

        if (true === $definition->hasParent()) {
            $class->setExtends($definition->getParentClassName());
            $namespace->addUse($definition->getParentFullClassName());
        }

        if (true === $definition->hasInterfaces()) {
            foreach ($definition->getInterfaces() as $interface) {
                $class->addImplement($interface->getClassName());
                $namespace->addUse($interface->getFullClassName());
            }
        }
        if (true === $definition->hasTraits()) {
            foreach ($definition->getTraits() as $trait) {
                $class->addTrait($trait->getClassName());
                $namespace->addUse($trait->getFullClassName());
            }
        }

        return $namespace;
    }
}
