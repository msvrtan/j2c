<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Php\Method;

use NullDevelopment\Skeleton\Php\Structure\MethodParameter;
use Webmozart\Assert\Assert;

/**
 * @see ConstructorMethodSpec
 * @see ConstructorMethodTest
 */
class ConstructorMethod implements Method
{
    /** @var MethodParameter[] */
    private $parameters;

    public function __construct(array $parameters)
    {
        Assert::allIsInstanceOf($parameters, MethodParameter::class);
        $this->parameters = $parameters;
    }

    /** @return MethodParameter[] */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}
