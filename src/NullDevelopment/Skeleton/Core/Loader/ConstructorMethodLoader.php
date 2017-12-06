<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Core\Loader;

use NullDevelopment\Skeleton\Core\ConfigurationLoader;
use NullDevelopment\Skeleton\Php\Method\ConstructorMethod;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\Php\Structure\MethodParameter;

/**
 * @see ConstructorMethodLoaderSpec
 * @see ConstructorMethodLoaderTest
 */
class ConstructorMethodLoader implements ConfigurationLoader
{
    public function load(?array $input): ?ConstructorMethod
    {
        if (null === $input) {
            return null;
        }

        $parameters = [];

        foreach ($input as $name => $inputParameter) {
            $parameter = array_merge($this->getDefaultParameterValues(), $inputParameter);

            $parameters[] = new MethodParameter(
                $name,
                ClassName::createFromFullyQualified($parameter['className']),
                $parameter['nullable'],
                $parameter['hasDefault'],
                $parameter['default']
            );
        }

        return new ConstructorMethod($parameters);
    }

    private function getDefaultParameterValues()
    {
        return [
            'className'  => 'integer',
            'nullable'   => false,
            'hasDefault' => false,
            'default'    => null,
        ];
    }
}
