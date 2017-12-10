<?php

declare(strict_types=1);

namespace JsonToConfig\JsonDetector\Factory\ValueObject\Simple;

use JsonToConfig\JsonDetector\Factory;
use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleFloat;

/**
 * @see SimpleFloatValueObjectFactorySpec
 * @see SimpleFloatValueObjectFactoryTest
 */
class SimpleFloatValueObjectFactory implements Factory
{
    public function isSatisfiedBy(string $key, $value): bool
    {
        return is_float($value);
    }

    public function create(string $key): SimpleFloat
    {
        return new SimpleFloat($key);
    }
}
