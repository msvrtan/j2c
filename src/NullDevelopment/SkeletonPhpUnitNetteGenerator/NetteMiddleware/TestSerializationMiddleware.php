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
            if (1 === count($definition->getProperties())) {
                /* @var Property $property */
                foreach ($definition->getProperties() as $property) {
                    $serializeBody = sprintf(
                        'self::assertEquals($this->%s, $this->sut->serialize());',
                        $property->getName()
                    );

                    $class->addMethod('testSerialize')
                        ->addBody($serializeBody);

                    $deserializeBody = sprintf(
                        'self::assertEquals($this->sut, $this->sut->deserialize($this->%s));',
                        $property->getName()
                    );

                    $class->addMethod('testDeserialize')
                        ->addBody($deserializeBody);
                }
            } else {
                $class->addMethod('testSerializeAndDeserialize')
                    ->addBody('$serialized = $this->sut->serialize();')
                    ->addBody('self::assertEquals($this->sut, '.$definition->getClassName().'::deserialize($serialized));')
                ;
            }
        }

        return $namespace;
    }
}
