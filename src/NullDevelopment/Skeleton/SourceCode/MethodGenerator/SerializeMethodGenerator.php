<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\Skeleton\SourceCode\Method\SerializeMethod;

/**
 * @see SerializeMethodGeneratorSpec
 * @see SerializeMethodGeneratorTest
 */
class SerializeMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof SerializeMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        if (1 === count($method->getProperties())) {
            $property = $method->getProperties()[0];

            if (true === $property->isObject()) {
                $code->addBody(
                    sprintf('return $this->%s->serialize();', $property->getName())
                );
            } else {
                $code->addBody(
                    sprintf('return $this->%s;', $property->getName())
                );
            }
        } else {
            foreach ($method->getProperties() as $property) {
                if (true === $property->isObject()) {
                    $code->addBody(
                        sprintf('return $this->%s->serialize();', $property->getName())
                    );
                } else {
                    $code->addBody(
                        sprintf('return $this->%s;', $property->getName())
                    );
                }
            }
        }
    }
}
