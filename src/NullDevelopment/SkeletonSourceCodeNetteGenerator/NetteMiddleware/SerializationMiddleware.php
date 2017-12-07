<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeNetteGenerator\NetteMiddleware;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\Php\Structure\Property;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class SerializationMiddleware implements PartialCodeGeneratorMiddleware
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
                    $class->addMethod('serialize')
                        ->setReturnType($property->getStructureName()->getName())
                        ->addBody('return $this->'.$property->getName().';');

                    $deserializeMethod = $class->addMethod('deserialize')
                        ->setStatic(true)
                        ->setReturnType('self')
                        ->addBody('return new self($'.$property->getName().');');

                    $deserializeMethod->addParameter($property->getName())
                        ->setTypeHint($property->getStructureName()->getName());
                }
            } else {
                $serializeList   =[];
                $deserializeList = [];

                /* @var Property $property */
                foreach ($definition->getProperties() as $property) {
                    if (false === in_array($property->getStructureFullName(), ['int', 'string', 'float', 'bool', 'array', 'DateTime'])) {
                        $serializeList[]   = sprintf("'%s' => \$this->%s->serialize()", $property->getName(), $property->getName());
                        $deserializeList[] = sprintf("%s::deserialize(\$data['%s'])", $property->getStructureName()->getName(), $property->getName());
                    } elseif ('DateTime' === $property->getStructureFullName()) {
                        $serializeList[]  = sprintf("'%s' => \$this->%s->format('c')", $property->getName(), $property->getName());
                        $deserializeList[]= sprintf("new DateTime(\$data['%s'])", $property->getName());
                    } else {
                        $serializeList[]  = sprintf("'%s' => \$this->%s", $property->getName(), $property->getName());
                        $deserializeList[]= sprintf("\$data['%s']", $property->getName());
                    }
                }

                $indent = PHP_EOL.'    ';

                $class->addMethod('serialize')
                    ->setReturnType('array')
                    ->addBody('return ['.$indent.implode(', '.$indent, $serializeList).PHP_EOL.'];');

                $deserializeMethod = $class->addMethod('deserialize')
                    ->setStatic(true)
                    ->setReturnType('self')
                    ->addBody('return new self('.$indent.implode(', '.$indent, $deserializeList).PHP_EOL.');');

                $deserializeMethod->addParameter('data')
                    ->setTypeHint('array');
            }
        }

        return $namespace;
    }
}
