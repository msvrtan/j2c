<?php

declare(strict_types=1);

namespace App\Service\JsonDetector\Factory\ValueObject\Simple;

use App\Service\JsonDetector\Factory;
use App\Service\JsonDetector\ValueObject\Simple\SimpleString;

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
