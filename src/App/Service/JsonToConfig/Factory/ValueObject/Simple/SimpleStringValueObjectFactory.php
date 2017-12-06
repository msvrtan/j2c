<?php

declare(strict_types=1);

namespace App\Service\JsonToConfig\Factory\ValueObject\Simple;

use App\Service\JsonToConfig\Factory;
use App\Service\JsonToConfig\ValueObject\Simple\SimpleString;

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
