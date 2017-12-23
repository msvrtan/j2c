<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\PhpSpec\Method\LetMethod;
use NullDevelopment\Skeleton\SourceCode\Method;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator;

/**
 * @see LetMethodGeneratorSpec
 * @see LetMethodGeneratorTest
 */
class LetMethodGenerator implements MethodGenerator
{
    /** @var ExampleMaker */
    private $exampleMaker;

    public function __construct(ExampleMaker $exampleMaker)
    {
        $this->exampleMaker = $exampleMaker;
    }

    public function supports(Method $method): bool
    {
        if ($method instanceof LetMethod) {
            return true;
        }

        return false;
    }

    public function generate(Method $method): string
    {
        $code = new NetteMethod($method->getName());

        $code->setVisibility((string) $method->getVisibility());

        if ('' !== $method->getReturnType()) {
            $code->setReturnType($method->getReturnType());
            $code->setReturnNullable($method->isNullableReturnType());
        }

        foreach ($method->getParameters() as $parameter) {
            if (true === $parameter->isObject()) {
                $code->addParameter($parameter->getName())
                    ->setTypeHint($parameter->getInstanceNameAsString());
            }
        }

        $this->generateMethodBody($method, $code);

        return $code->__toString();
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $parameters = [];

        foreach ($method->getParameters() as $parameter) {
            if (true === $parameter->isObject()) {
                $parameters[] = '$'.$parameter->getName();
            } else {
                $parameters[] = sprintf('$%s = %s', $parameter->getName(), $this->exampleMaker->value($parameter));
            }
        }

        $zz = implode(', ', $parameters);

        $code->addBody(
            sprintf('$this->beConstructedWith(%s);', $zz)
        );
    }
}
