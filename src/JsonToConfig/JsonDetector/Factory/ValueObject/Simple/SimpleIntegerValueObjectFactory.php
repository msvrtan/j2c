<?php

declare(strict_types=1);

namespace JsonToConfig\JsonDetector\Factory\ValueObject\Simple;

use JsonToConfig\JsonDetector\Factory;
use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleInteger;

/**
 * @see SimpleIntegerValueObjectFactorySpec
 * @see SimpleIntegerValueObjectFactoryTest
 */
class SimpleIntegerValueObjectFactory implements Factory
{
    public function isSatisfiedBy(string $key, $value): bool
    {
        return is_int($value);
    }

    public function create(string $key): SimpleInteger
    {
        return new SimpleInteger($key);
    }
}
