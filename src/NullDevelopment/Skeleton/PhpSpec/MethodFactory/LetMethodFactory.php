<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\Skeleton\PhpSpec\Method\LetMethod;
use NullDevelopment\Skeleton\PhpSpecMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;

/**
 * @see LetMethodFactorySpec
 * @see LetMethodFactoryTest
 */
class LetMethodFactory implements PhpSpecMethodFactory
{
    public function createFromConstructorMethod(ConstructorMethod $constructorMethod): LetMethod
    {
        return new LetMethod(
            $constructorMethod->getParameters()
        );
    }
}
