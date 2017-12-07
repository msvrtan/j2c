<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\Php\Structure\MethodParameter;
use NullDevelopment\Skeleton\Php\Structure\Visibility;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class ConstructorMiddleware implements PartialCodeGeneratorMiddleware
{
    public function execute($definition, callable $next)
    {
        /** @var PhpNamespace $namespace */
        $namespace = $next($definition);

        if (false === $definition->hasConstructorMethod()) {
            return $namespace;
        }

        /** @var ClassType $class */
        foreach ($namespace->getClasses() as $class) {
            $constructorMethod = $class->addMethod('__construct')
                ->setVisibility(Visibility::PUBLIC);

            /** @var MethodParameter $parameter */
            foreach ($definition->getConstructorParameters() as $parameter) {
                $assign = sprintf('$this->%s = $%s;', $parameter->getName(), $parameter->getName());
                $constructorMethod->addBody($assign);

                $constructorMethod->addParameter($parameter->getName())
                    ->setTypeHint($parameter->getClassFullName())
                    ->setNullable($parameter->isNullable());

                $property = $class->addProperty($parameter->getName())
                    ->setVisibility(Visibility::PRIVATE);

                if (true === $parameter->isNullable()) {
                    $property->addComment('@var '.$parameter->getClassName()->getName().'|null');
                } else {
                    $property->addComment('@var '.$parameter->getClassName()->getName());
                }

                $class->addMethod('get'.ucfirst($parameter->getName()))
                    ->setReturnType($parameter->getClassFullName())
                    ->setReturnNullable($parameter->isNullable())
                    ->addBody('return $this->'.$parameter->getName().';');

                if (false === in_array($parameter->getClassFullName(), ['int', 'string', 'float', 'bool', 'array'])) {
                    $namespace->addUse($parameter->getClassFullName());
                }
            }
        }

        return $namespace;
    }
}
