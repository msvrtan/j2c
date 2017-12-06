<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Core\Loader;

use NullDevelopment\Skeleton\Core\ConfigurationLoader;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\Php\Structure\Property;
use NullDevelopment\Skeleton\Php\Structure\Visibility;

/**
 * @see PropertyLoaderSpec
 * @see PropertyLoaderTest
 */
class PropertyLoader implements ConfigurationLoader
{
    /** @return Property[] */
    public function load(?array $input): array
    {
        if (null === $input) {
            return [];
        }

        $result = [];

        foreach ($input as $name => $item) {
            $data = array_merge($this->getDefaultPropertyValues(), $item);

            $result[] = new Property(
                $name,
                ClassName::createFromFullyQualified($data['className']),
                $data['nullable'],
                $data['hasDefault'],
                $data['default'],
                new Visibility($data['visibility']),
                $data['setter'],
                $data['getter']
            );
        }

        return $result;
    }

    private function getDefaultPropertyValues()
    {
        return [
            'className'  => 'integer',
            'nullable'   => false,
            'hasDefault' => false,
            'default'    => null,
            'visibility' => Visibility::PRIVATE,
            'setter'     => false,
            'getter'     => true,
        ];
    }
}
