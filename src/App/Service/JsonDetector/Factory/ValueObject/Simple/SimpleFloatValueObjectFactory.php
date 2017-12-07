<?php

declare(strict_types=1);

namespace App\Service\JsonDetector\Factory\ValueObject\Simple;

use App\Service\JsonDetector\Factory;
use App\Service\JsonDetector\ValueObject\Simple\SimpleFloat;

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
