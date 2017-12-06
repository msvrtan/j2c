<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\Php\Structure\Property;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class TestSerializationMiddleware implements PartialCodeGeneratorMiddleware
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
                    'self::assertEquals($this->%s, $this->sut->serialize());',
                    $parameter->getName()
                );

                $class->addMethod('testSerialize')
                    ->addBody($serializeBody);

                $deserializeBody = sprintf(
                    'self::assertEquals($this->sut, $this->sut->deserialize($this->%s));',
                    $parameter->getName()
                );

                $class->addMethod('testDeserialize')
                    ->addBody($deserializeBody);
            }
        }

        return $namespace;
    }
}
