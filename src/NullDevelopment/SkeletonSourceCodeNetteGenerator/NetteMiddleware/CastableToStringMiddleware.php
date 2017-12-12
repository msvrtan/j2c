<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\Php\Structure\Property;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class CastableToStringMiddleware implements PartialCodeGeneratorMiddleware
{
    public function execute($definition, callable $next)
    {
        /** @var PhpNamespace $namespace */
        $namespace = $next($definition);

        /** @var ClassType $class */
        foreach ($namespace->getClasses() as $class) {
            /** @var Property $property */
            foreach ($definition->getProperties() as $property) {
                $toStringMethod = $class->addMethod('__toString')
                    ->setReturnType('string');

                if ('bool' === $property->getStructureFullName()) {
                    $toStringMethod->addBody('if(true === $this->'.$property->getName().'){');
                    $toStringMethod->addBody("    return 'true';");
                    $toStringMethod->addBody('}else{');
                    $toStringMethod->addBody("    return 'false';");
                    $toStringMethod->addBody('}');
                } elseif ('string' === $property->getStructureFullName()) {
                    $toStringMethod->addBody('return $this->'.$property->getName().';');
                } else {
                    $toStringMethod->addBody('return (string) $this->'.$property->getName().';');
                }
            }
        }

        return $namespace;
    }
}
