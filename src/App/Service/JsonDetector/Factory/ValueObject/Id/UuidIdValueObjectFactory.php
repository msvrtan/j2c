<?php

declare(strict_types=1);

namespace App\Service\JsonDetector\Factory\ValueObject\Id;

use App\Service\JsonDetector\Factory;
use App\Service\JsonDetector\ValueObject\Id\UuidId;

/**
 * @see UuidIdValueObjectFactorySpec
 * @see UuidIdValueObjectFactoryTest
 */
class UuidIdValueObjectFactory implements Factory
{
    public function isSatisfiedBy(string $key, $value): bool
    {
        if (false === is_string($value)) {
            return false;
        }

        if (1 !== preg_match('/[_id|Id|ID]$/', $key)) {
            return false;
        }

        if (preg_match('/^\{?[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}\}?$/', $value)) {
            return true;
        }

        return false;
    }

    public function create(string $key): UuidId
    {
        return new UuidId($key);
    }
}
