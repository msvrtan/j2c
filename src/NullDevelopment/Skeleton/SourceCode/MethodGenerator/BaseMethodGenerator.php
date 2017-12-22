<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\Skeleton\SourceCode\Method;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator;

abstract class BaseMethodGenerator implements MethodGenerator
{
    public function generate(Method $method): string
    {
        $code = new NetteMethod($method->getName());

        $code->setVisibility((string) $method->getVisibility());

        if ('' !== $method->getReturnType()) {
            $code->setReturnType($method->getReturnType());
            $code->setReturnNullable($method->isNullableReturnType());
        }

        foreach ($method->getParameters() as $parameter) {
            $code->addParameter($parameter->getName())
                ->setTypeHint($parameter->getInstanceNameAsString());
        }

        $this->generateMethodBody($method, $code);

        return $code->__toString();
    }

    abstract protected function generateMethodBody($method, NetteMethod $code);
}
