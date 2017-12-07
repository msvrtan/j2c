<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware;

use DateTime;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\Php\Structure\MethodParameter;
use NullDevelopment\Skeleton\Php\Structure\Visibility;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;
use ReflectionClass;

class SetUpMiddleware implements PartialCodeGeneratorMiddleware
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
            $setUpMethod = $class->addMethod('setUp')
                ->setVisibility(Visibility::PUBLIC);

            $constructorParams = [];
            /** @var MethodParameter $parameter */
            foreach ($definition->getConstructorParameters() as $parameter) {
                $setUpMethod->addBody(
                    sprintf('$this->%s = %s;', $parameter->getName(), $this->suggestValue($parameter))
                );
                $constructorParams[] = '$this->'.$parameter->getName();

                if (false === in_array($parameter->getClassFullName(), ['int', 'string', 'float', 'bool', 'array'])) {
                    $namespace->addUse($parameter->getClassFullName());
                }
            }

            $setUpMethod->addBody(
                sprintf(
                    '$this->sut = new %s(%s);',
                    $definition->getClassName(),
                    implode(', ', $constructorParams)
                )
            );
        }

        return $namespace;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     */
    private function suggestValue(MethodParameter $parameter)
    {
        if ('string' === $parameter->getClassFullName()) {
            return "'".$parameter->getName()."'";
        } elseif ('int' === $parameter->getClassFullName()) {
            return 1;
        } elseif ('float' === $parameter->getClassFullName()) {
            return 2.0;
        } elseif ('bool' === $parameter->getClassFullName()) {
            return true;
        } elseif ('array' === $parameter->getClassFullName()) {
            return ['data'];
        } elseif ('DateTime' === $parameter->getClassFullName()) {
            return "new DateTime('2018-03-04 14:15:16')";
        }

        $refl = new ReflectionClass($parameter->getClassFullName());

        while ($parent = $refl->getParentClass()) {
            if (DateTime::class === $parent->getName()) {
                return 'new '.ucfirst($parameter->getClassName()->getName())."('2018-02-03 12:23:34')";
            }
        }
        $zzz = [];
        foreach ($refl->getConstructor()->getParameters()  as $param) {
            if ($param->getType()) {
                $type = $param->getType()->__toString();
                if ('string' === $type) {
                    $zzz[] = "'".$parameter->getName()."'";
                } elseif ('int' === $type) {
                    $zzz[] = 1;
                } elseif ('float' === $type) {
                    $zzz[] = 2.0;
                } elseif ('bool' === $type) {
                    $zzz[] = true;
                } elseif ('array' === $type) {
                    $zzz[] = ['data'];
                } else {
                    $zzz[] = "'".$parameter->getName()."'";
                }
            }
        }

        return 'new '.ucfirst($parameter->getClassName()->getName()).'('.implode(', ', $zzz).')';

        return;

        return '$'.$parameter->getName();
    }
}
