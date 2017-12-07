<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\Php\Structure\MethodParameter;
use NullDevelopment\Skeleton\Php\Structure\Visibility;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class LetMiddleware implements PartialCodeGeneratorMiddleware
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
            $letMethod = $class->addMethod('let')
                ->setVisibility(Visibility::PUBLIC);

            $beConstructedWithArguments = [];
            /** @var MethodParameter $parameter */
            foreach ($definition->getConstructorParameters() as $parameter) {
                if (false === in_array($parameter->getClassFullName(), ['int', 'string', 'float', 'bool', 'array'])) {
                    $namespace->addUse($parameter->getClassFullName());

                    $letMethod->addParameter($parameter->getName())
                        ->setTypeHint($parameter->getClassFullName());

                    $beConstructedWithArguments[] = '$'.$parameter->getName();
                } else {
                    $beConstructedWithArguments[] = '$'.$parameter->getName().' = '.$parameter->suggestValue();
                }
            }

            $letMethod->addBody(
                '$this->beConstructedWith('.implode(', ', $beConstructedWithArguments).');'
            );

            $initializableMethod = $class->addMethod('it_is_initializable');

            $initializableMethod->addBody('$this->shouldHaveType('.$definition->getClassName().'::class);');

            if (true === $definition->hasParent()) {
                $initializableMethod->addBody(
                    '$this->shouldHaveType('.$definition->getParentClassName().'::class);'
                );
            }

            if (true === $definition->hasInterfaces()) {
                foreach ($definition->getInterfaces() as $interface) {
                    $initializableMethod->addBody('$this->shouldImplement('.$interface->getClassName().'::class);');
                }
            }
        }

        return $namespace;
    }
}
