<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\Php\Structure\Property;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class SpecGetterMiddleware implements PartialCodeGeneratorMiddleware
{
    public function execute($definition, callable $next)
    {
        /** @var PhpNamespace $namespace */
        $namespace = $next($definition);

        /** @var ClassType $class */
        foreach ($namespace->getClasses() as $class) {
            /* @var Property $property */
            foreach ($definition->getProperties() as $property) {
                $body = sprintf(
                    '$this->%s()->shouldReturn(%s);',
                    'get'.ucfirst($property->getName()),
                    $property->suggestValue()
                );

                $getterMethod= $class->addMethod('it_exposes_'.$property->getName())->addBody($body);

                if (false === in_array($property->getStructureFullName(), ['int', 'string', 'float', 'bool', 'array'])) {
                    $namespace->addUse($property->getStructureFullName());

                    $getterMethod->addParameter($property->getName())
                        ->setTypeHint($property->getStructureFullName());
                }
            }
        }

        return $namespace;
    }
}
