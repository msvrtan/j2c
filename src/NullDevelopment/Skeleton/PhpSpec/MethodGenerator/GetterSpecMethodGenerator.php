<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\PhpSpec\Method\GetterSpecMethod;
use NullDevelopment\Skeleton\SourceCode\Method;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator\BaseMethodGenerator;

/**
 * @see GetterSpecMethodGeneratorSpec
 * @see GetterSpecMethodGeneratorTest
 */
class GetterSpecMethodGenerator extends BaseMethodGenerator
{
    /** @var ExampleMaker */
    private $exampleMaker;

    public function __construct(ExampleMaker $exampleMaker)
    {
        $this->exampleMaker = $exampleMaker;
    }

    public function supports(Method $method): bool
    {
        if ($method instanceof GetterSpecMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        if (true === $method->getProperty()->isObject()) {
            $value = '$'.$method->getPropertyName();
        } else {
            $value = (string) $this->exampleMaker->value($method->getProperty());
        }

        $code->addBody(
            sprintf('$this->%s()->shouldReturn(%s);', $method->getMethodUnderTest(), $value)
        );
    }
}
