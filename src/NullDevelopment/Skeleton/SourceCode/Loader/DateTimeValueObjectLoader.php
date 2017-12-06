<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\Loader;

use NullDevelopment\Skeleton\Core\Loader\InterfaceLoader;
use NullDevelopment\Skeleton\Core\Loader\TraitLoader;
use NullDevelopment\Skeleton\Core\ObjectConfigurationLoader;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\DateTimeValueObject;

/**
 * @see DateTimeValueObjectLoaderSpec
 * @see DateTimeValueObjectLoaderTest
 */
class DateTimeValueObjectLoader implements ObjectConfigurationLoader
{
    /** @var InterfaceLoader */
    private $interfaceLoader;
    /** @var TraitLoader */
    private $traitLoader;

    public function __construct(InterfaceLoader $interfaceLoader, TraitLoader $traitLoader)
    {
        $this->interfaceLoader = $interfaceLoader;
        $this->traitLoader     = $traitLoader;
    }

    public function supports(array $input): bool
    {
        if ('DateTimeValueObject' === $input['type']) {
            return true;
        }

        return false;
    }

    public function load(array $input): DateTimeValueObject
    {
        $data = array_merge($this->getDefaultValues(), $input);

        $parent     = $this->extractParent($data);
        $interfaces = $this->interfaceLoader->load($data['interfaces']);
        $traits     = $this->traitLoader->load($data['traits']);

        return new DateTimeValueObject(
            ClassName::createFromFullyQualified($data['className']),
            $parent,
            $interfaces,
            $traits,
            null,
            []
        );
    }

    public function getDefaultValues(): array
    {
        return [
            'type'       => 'DateTimeValueObject',
            'className'  => null,
            'parent'     => '\DateTime',
            'interfaces' => [],
            'traits'     => [],
        ];
    }

    private function extractParent(array $data): ?ClassName
    {
        if (null === $data['parent']) {
            return null;
        }

        return ClassName::createFromFullyQualified($data['parent']);
    }
}
