<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\Php\Structure\Property;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class SpecSerializationMiddleware implements PartialCodeGeneratorMiddleware
{
    public function execute($definition, callable $next)
    {
        /** @var PhpNamespace $namespace */
        $namespace = $next($definition);

        /** @var ClassType $class */
        foreach ($namespace->getClasses() as $class) {
            /* @var Property $property */
            foreach ($definition->getProperties() as $parameter) {
                $serializeBody = sprintf(
                    '$this->serialize()->shouldReturn(%s);',
                    $parameter->suggestValue()
                );

                $class->addMethod('it_is_serializable')
                    ->addBody($serializeBody);

                $deserializeBody = sprintf(
                    '$this->deserialize(%s)->shouldReturnAnInstanceOf(%s::class);',
                    $parameter->suggestValue(),
                    $definition->getClassName()
                );

                $class->addMethod('it_is_deserializable')
                    ->addBody($deserializeBody);
            }
        }

        return $namespace;
    }
}
