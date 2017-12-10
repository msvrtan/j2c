<?php

declare(strict_types=1);

namespace JsonToConfig\JsonDetector\Factory\ValueObject\Simple;

use JsonToConfig\JsonDetector\Factory;
use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleBool;

/**
 * @see SimpleBoolValueObjectFactorySpec
 * @see SimpleBoolValueObjectFactoryTest
 */
class SimpleBoolValueObjectFactory implements Factory
{
    public function isSatisfiedBy(string $key, $value): bool
    {
        return is_bool($value);
    }

    public function create(string $key): SimpleBool
    {
        return new SimpleBool($key);
    }
}
