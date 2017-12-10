<?php

declare(strict_types=1);

namespace JsonToConfig\JsonDetector\Factory\ValueObject\Simple;

use JsonToConfig\JsonDetector\Factory;
use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleString;

/**
 * @see SimpleStringValueObjectFactorySpec
 * @see SimpleStringValueObjectFactoryTest
 */
class SimpleStringValueObjectFactory implements Factory
{
    public function isSatisfiedBy(string $key, $value): bool
    {
        return is_string($value);
    }

    public function create(string $key): SimpleString
    {
        return new SimpleString($key);
    }
}
