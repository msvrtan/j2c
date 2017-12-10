<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware;

use Miro\ExampleMaker\ExampleMaker;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\Php\Structure\Property;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;

class SpecGetterMiddleware implements PartialCodeGeneratorMiddleware
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

        /** @var ClassType $class */
        foreach ($namespace->getClasses() as $class) {
            /* @var Property $property */
            foreach ($definition->getProperties() as $property) {
                $propertyName = $property->getName();
                $propertyType = $property->getStructureFullName();

                $getterMethod = $class->addMethod('it_exposes_'.$propertyName);

                if (true === in_array($propertyType, ['int', 'string', 'float', 'bool', 'array'])) {
                    $getterMethod->addBody(
                        sprintf('$this->get%s()->shouldReturn(%s);', ucfirst($propertyName), $this->exampleMaker->value($property))
                    );
                } else {
                    $getterMethod->addBody(
                        sprintf('$this->get%s()->shouldReturn($%s);', ucfirst($propertyName), $propertyName)
                    );

                    $namespace->addUse($propertyType);

                    $getterMethod->addParameter($propertyName)
                        ->setTypeHint($propertyType);
                }
            }
        }

        return $namespace;
    }
}
