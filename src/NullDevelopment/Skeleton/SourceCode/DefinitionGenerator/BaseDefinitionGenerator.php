<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use Nette\PhpGenerator\ClassType as NetteClass;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator;
use Webmozart\Assert\Assert;

abstract class BaseDefinitionGenerator implements DefinitionGenerator
{
    /** @var MethodGenerator[] */
    private $methodGenerators;

    public function __construct(array $methodGenerators)
    {
        Assert::allIsInstanceOf($methodGenerators, MethodGenerator::class);
        $this->methodGenerators = $methodGenerators;
    }

    abstract public function supports(ClassType $definition): bool;

    public function generateAsString(ClassType $definition): string
    {
        $code = $this->generate($definition);

        return $code->__toString();
    }

    public function generate(ClassType $definition): NetteClass
    {
        if (null === $definition->getNamespace()) {
            $namespace = null;
        } else {
            $namespace = new PhpNamespace($definition->getNamespace());
        }

        $code = new NetteClass($definition->getClassName(), $namespace);

        if (true === $definition->hasParent()) {
            $code->setExtends($definition->getParentFullClassName());
        }

        foreach ($definition->getInterfaces() as $interface) {
            $code->addImplement($interface->getFullName());
        }

        foreach ($definition->getProperties() as $property) {
            $propertyCode = $code->addProperty($property->getName())
                ->setVisibility((string) $property->getVisibility());

            if (true === $property->hasDefaultValue()) {
                $propertyCode->setValue($property->getDefaultValue());
            }
            $propertyCode->addComment(sprintf('@var %s', $property->getInstanceFullName()));
        }
        $methods = [];

        foreach ($this->methodGenerators as $methodGenerator) {
            foreach ($definition->getMethods() as $method) {
                if (true === $methodGenerator->supports($method)) {
                    $methods[] = $methodGenerator->generate($method);
                }
            }
        }

        $code->setMethods($methods);

        return $code;
    }
}