<?php

declare(strict_types=1);

namespace App\Service\JsonToConfig\Factory\ValueObject\Id;

use App\Service\JsonToConfig\Factory;
use App\Service\JsonToConfig\ValueObject\Id\IntegerId;

/**
 * @see IntegerIdValueObjectFactorySpec
 * @see IntegerIdValueObjectFactoryTest
 */
class IntegerIdValueObjectFactory implements Factory
{
    public function isSatisfiedBy(string $key, $value): bool
    {
        if (false === is_int($value)) {
            return false;
        }

        if (1 !== preg_match('/[_id|Id|ID]$/', $key)) {
            return false;
        }

        return true;
    }

    public function create(string $key): IntegerId
    {
        return new IntegerId($key);
    }
}
