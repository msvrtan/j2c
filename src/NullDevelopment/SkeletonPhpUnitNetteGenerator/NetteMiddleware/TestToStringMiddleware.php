<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\Php\Structure\Property;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class TestToStringMiddleware implements PartialCodeGeneratorMiddleware
{
    public function execute($definition, callable $next)
    {
        /** @var PhpNamespace $namespace */
        $namespace = $next($definition);

        /** @var ClassType $class */
        foreach ($namespace->getClasses() as $class) {
            /* @var Property $property */
            foreach ($definition->getProperties() as $property) {
                $cast = '';

                if (true === in_array($property->getStructureFullName(), ['int', 'float'])) {
                    $cast = '(string) ';
                }

                $body = sprintf(
                    'self::assertSame(%s$this->%s, $this->sut->__toString());',
                    $cast,
                    $property->getName()
                );

                $class->addMethod('testToString')->addBody($body);
            }
        }

        return $namespace;
    }
}
