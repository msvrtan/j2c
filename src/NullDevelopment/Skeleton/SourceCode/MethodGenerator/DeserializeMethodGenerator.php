<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\Skeleton\SourceCode\Method\DeserializeMethod;

/**
 * @see DeserializeMethodGeneratorSpec
 * @see DeserializeMethodGeneratorTest
 */
class DeserializeMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof DeserializeMethod) {
            return true;
        }

        return false;
    }

    public function generate(Method $method): NetteMethod
    {
        $code = new NetteMethod($method->getName());

        $code->setVisibility((string) $method->getVisibility());
        $code->setStatic($method->isStatic());

        if ('' !== $method->getReturnType()) {
            $code->setReturnType($method->getReturnType());
            $code->setReturnNullable($method->isNullableReturnType());
        }

        foreach ($method->getParameters() as $parameter) {
            if (true === $parameter->isObject()) {
                //@TODO: hardcoded string
                $code->addParameter($parameter->getName())
                    ->setTypeHint('string');
            } else {
                $code->addParameter($parameter->getName())
                    ->setTypeHint($parameter->getInstanceFullName());
            }
        }

        $this->generateMethodBody($method, $code);

        return $code;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $params = [];

        foreach ($method->getProperties() as $property) {
            if (true === $property->isObject()) {
                $params[] = sprintf('new %s($%s)', $property->getInstanceFullName(), $property->getName());
            } else {
                $params[] = '$'.$property->getName();
            }
        }

        $code->addBody(
            sprintf('return new self(%s);', implode(', ', $params))
        );
    }
}
