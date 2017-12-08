<?php

declare(strict_types=1);

namespace App\Service\JsonDetector\Factory\ValueObject\Simple;

use App\Service\JsonDetector\Factory;
use App\Service\JsonDetector\ValueObject\Simple\SimpleCollection;

/**
 * @see SimpleCollectionFactorySpec
 * @see SimpleCollectionFactoryTest
 */
class SimpleCollectionFactory implements Factory
{
    public function isSatisfiedBy(string $key, $value): bool
    {
        if (false === is_array($value)) {
            return false;
        }

        foreach (array_keys($value) as $key) {
            if (false === is_int($key)) {
                return false;
            }
        }

        return true;
    }

    public function create(string $key): SimpleCollection
    {
        return new SimpleCollection($key);
    }
}
