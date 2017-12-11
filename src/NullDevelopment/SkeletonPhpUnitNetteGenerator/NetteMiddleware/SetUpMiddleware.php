<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\Php\Structure\MethodParameter;
use NullDevelopment\Skeleton\Php\Structure\Visibility;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class SetUpMiddleware implements PartialCodeGeneratorMiddleware
{
    /** @var ExampleMaker */
    private $exampleMaker;

    public function __construct(ExampleMaker $exampleMaker)
    {
        $this->exampleMaker = $exampleMaker;
    }

    public function execute($definition, callable $next)
    {
        /** @var PhpNamespace $namespace */
        $namespace = $next($definition);

        if (false === $definition->hasConstructorMethod()) {
            return $namespace;
        }

        /** @var ClassType $class */
        foreach ($namespace->getClasses() as $class) {
            $setUpMethod = $class->addMethod('setUp')
                ->setVisibility(Visibility::PUBLIC);

            $constructorParams = [];
            /** @var MethodParameter $parameter */
            foreach ($definition->getConstructorParameters() as $parameter) {
                $exampleValue = $this->exampleMaker->instance($parameter);

                foreach ($exampleValue->classesToImport() as $classToImport) {
                    $namespace->addUse($classToImport->getFullName());
                }

                $setUpMethod->addBody(
                    sprintf('$this->%s = %s;', $parameter->getName(), $exampleValue)
                );
                $constructorParams[] = '$this->'.$parameter->getName();

                if (false === in_array($parameter->getStructureFullName(), ['int', 'string', 'float', 'bool', 'array'])) {
                    $namespace->addUse($parameter->getStructureFullName());
                }
            }

            $setUpMethod->addBody(
                sprintf('$this->sut = new %s(%s);', $definition->getClassName(), implode(', ', $constructorParams))
            );
        }

        return $namespace;
    }
}
