<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\Php\Structure\Property;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class SerializationMiddleware implements PartialCodeGeneratorMiddleware
{
    public function execute($definition, callable $next)
    {
        /** @var PhpNamespace $namespace */
        $namespace = $next($definition);

        /** @var ClassType $class */
        foreach ($namespace->getClasses() as $class) {
            /* @var Property $property */
            foreach ($definition->getProperties() as $parameter) {
                $class->addMethod('serialize')
                    ->setReturnType($parameter->getStructureName()->getName())
                    ->addBody('return $this->'.$parameter->getName().';');

                $deserializeMethod = $class->addMethod('deserialize')
                    ->setStatic(true)
                    ->setReturnType('self')
                    ->addBody('return new self($'.$parameter->getName().');');

                $deserializeMethod->addParameter($parameter->getName())
                    ->setTypeHint($parameter->getStructureName()->getName());
            }
        }

        return $namespace;
    }
}
