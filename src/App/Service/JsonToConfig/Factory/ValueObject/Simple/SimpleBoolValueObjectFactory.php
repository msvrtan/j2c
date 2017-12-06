<?php

declare(strict_types=1);

namespace App\Service\JsonToConfig\Factory\ValueObject\Simple;

use App\Service\JsonToConfig\Factory;
use App\Service\JsonToConfig\ValueObject\Simple\SimpleBool;

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
