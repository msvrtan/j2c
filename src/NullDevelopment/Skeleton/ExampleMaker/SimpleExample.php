<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\ExampleMaker;

/**
 * @see SimpleExampleSpec
 * @see SimpleExampleTest
 */
class SimpleExample implements Example
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function __toString(): string
    {
        if (true === is_string($this->value)) {
            return "'".$this->value."'";
        }

        return (string) $this->value;
    }

    public function classesToImport(): array
    {
        return [];
    }
}