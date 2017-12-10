<?php

declare(strict_types=1);

namespace Miro\ExampleMaker;

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
    public function instance(Variable $variable): string
    {
        switch ($variable->getStructureFullName()) {
            case 'int':
            case 'string':
            case 'float':
            case 'bool':
            case 'array':
                return $this->value($variable);
            case 'DateTime':
                return "new \DateTime(".$this->value($variable).')';
        }

        $refl = new ReflectionClass($variable->getStructureFullName());

        while ($parent = $refl->getParentClass()) {
            if (DateTime::class === $parent->getName()) {
                return 'new '.$variable->getStructureName()->getName()."('2018-01-01 00:01:00')";
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

        return 'new \\'.$variable->getStructureName()->getFullName().'('.implode(', ', $arguments).')';
    }

    /** @SuppressWarnings(PHPMD.CyclomaticComplexity) */
    public function value(Variable $variable): string
    {
        switch ($variable->getStructureFullName()) {
            case 'int':
                return '1';
            case 'string':
                return sprintf("'%s'", $variable->getName());
            case 'float':
                return '2.0';
            case 'bool':
                return 'true';
            case 'array':
                return "['data']";
            case 'DateTime':
                return "'2018-01-01 00:01:00'";
        }

        $refl = new ReflectionClass($variable->getStructureFullName());

        while ($parent = $refl->getParentClass()) {
            if (DateTime::class === $parent->getName()) {
                return "'2018-01-01 00:01:00'";
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
            return '['.implode(', ', $arguments).']';
        } elseif (1 === count($arguments)) {
            return array_pop($arguments);
        } else {
            return 'WTF?';
        }
    }
}
