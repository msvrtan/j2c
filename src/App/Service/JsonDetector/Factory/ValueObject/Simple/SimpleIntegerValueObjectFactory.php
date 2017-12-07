<?php

declare(strict_types=1);

namespace App\Service\JsonDetector\Factory\ValueObject\Simple;

use App\Service\JsonDetector\Factory;
use App\Service\JsonDetector\ValueObject\Simple\SimpleInteger;

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
