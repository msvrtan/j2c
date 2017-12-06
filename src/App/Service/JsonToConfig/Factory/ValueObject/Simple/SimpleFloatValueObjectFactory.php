<?php

declare(strict_types=1);

namespace App\Service\JsonToConfig\Factory\ValueObject\Simple;

use App\Service\JsonToConfig\Factory;
use App\Service\JsonToConfig\ValueObject\Simple\SimpleFloat;

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
