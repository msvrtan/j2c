<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\ExampleMaker;

use DateTime;
use Exception;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\Php\Structure\SimpleVariable;
use NullDevelopment\Skeleton\Php\Structure\Variable;
use ReflectionClass;

/**
 * @see ExampleMakerSpec
 * @see ExampleMakerTest
 */
class ExampleMaker
{
    /** @SuppressWarnings(PHPMD.CyclomaticComplexity) */
    public function instance(Variable $variable): Example
    {
        switch ($variable->getStructureFullName()) {
            case 'int':
            case 'string':
            case 'float':
            case 'bool':
            case 'array':
                return $this->value($variable);
            case 'DateTime':
                return new InstanceExample(new ClassName('DateTime'), [$this->value($variable)]);
        }

        $refl = new ReflectionClass($variable->getStructureFullName());

        while ($parent = $refl->getParentClass()) {
            if (DateTime::class === $parent->getName()) {
                return new InstanceExample($variable->getStructureName(), [new SimpleExample('2018-01-01 00:01:00')]);
                //return new InstanceExample('new '.$variable->getStructureName()->getName()."('2018-01-01 00:01:00')");
            }
        }

        $arguments = [];
        foreach ($refl->getConstructor()->getParameters() as $parameter) {
            if ($parameter->getType()) {
                $paramAsVar = new SimpleVariable(
                    $parameter->getName(),
                    ClassName::createFromFullyQualified($parameter->getType()->__toString())
                );

                $arguments[] = $this->instance($paramAsVar);
            } else {
                //var_dump($parameter);
                throw new Exception('Err xxx1: Ha? No type on param?');
            }
        }

        return new InstanceExample($variable->getStructureName(), $arguments);
    }

    /** @SuppressWarnings(PHPMD.CyclomaticComplexity) */
    public function value(Variable $variable): Example
    {
        switch ($variable->getStructureFullName()) {
            case 'int':
                return new SimpleExample(1);
            case 'string':
                return new SimpleExample($variable->getName());
            case 'float':
                return new SimpleExample(2.0);
            case 'bool':
                return new SimpleExample(true);
            case 'array':
                return new ArrayExample([new SimpleExample('data')]);
            case 'DateTime':
                return new SimpleExample('2018-01-01 00:01:00');
        }

        $refl = new ReflectionClass($variable->getStructureFullName());

        while ($parent = $refl->getParentClass()) {
            if (DateTime::class === $parent->getName()) {
                return new SimpleExample('2018-01-01 00:01:00');
            }
        }

        $arguments = [];
        foreach ($refl->getConstructor()->getParameters() as $parameter) {
            if (null !== $parameter->getType()) {
                $paramAsVar = new SimpleVariable(
                    $variable->getName(),
                    ClassName::createFromFullyQualified($parameter->getType()->__toString())
                );

                $arguments[] = $this->value($paramAsVar);
            } else {
                //var_dump($parameter);
                throw new Exception('Err xxx2: Ha? No type on param?');
            }
        }

        if (count($arguments) > 1) {
            return new SimpleExample('['.implode(', ', $arguments).']');
        } elseif (1 === count($arguments)) {
            return new SimpleExample(array_pop($arguments));
        } else {
            return new SimpleExample('WTF?');
        }
    }
}
