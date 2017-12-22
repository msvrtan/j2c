<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\SourceCode\Method;
use Webmozart\Assert\Assert;

/**
 * @see ConstructorMethodSpec
 * @see ConstructorMethodTest
 */
class ConstructorMethod implements Method
{
    /** @var Property[] */
    private $properties;

    public function __construct(array $properties)
    {
        Assert::allIsInstanceOf($properties, Property::class);
        $this->properties = $properties;
    }

    public function getVisibility(): Visibility
    {
        return new Visibility('public');
    }

    public function getName(): string
    {
        return '__construct';
    }

    /** @return Property[] */
    public function getParameters(): array
    {
        return $this->properties;
    }

    public function getReturnType(): string
    {
        return '';
    }

    public function isNullableReturnType(): bool
    {
        return false;
    }
}