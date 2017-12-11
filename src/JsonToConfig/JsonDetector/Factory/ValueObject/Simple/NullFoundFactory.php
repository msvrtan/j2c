<?php

declare(strict_types=1);

namespace JsonToConfig\JsonDetector\Factory\ValueObject\Simple;

use JsonToConfig\JsonDetector\Factory;
use JsonToConfig\JsonDetector\ValueObject\Simple\NullFound;

/**
 * @see NullFoundFactorySpec
 * @see NullFoundFactoryTest
 */
class NullFoundFactory implements Factory
{
    public function isSatisfiedBy(string $key, $value): bool
    {
        return null === $value;
    }

    public function create(string $key): NullFound
    {
        return new NullFound($key);
    }
}
