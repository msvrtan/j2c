<?php

declare(strict_types=1);

namespace JsonToConfig\JsonDetector\Factory\ValueObject\Generix;

use JsonToConfig\JsonDetector\Factory;
use JsonToConfig\JsonDetector\ValueObject\Generix\Url;

/**
 * @see UrlValueObjectFactorySpec
 * @see UrlValueObjectFactoryTest
 */
class UrlValueObjectFactory implements Factory
{
    public function isSatisfiedBy(string $key, $value): bool
    {
        if (false === is_string($value)) {
            return false;
        }

        if (false === filter_var($value, FILTER_VALIDATE_URL)) {
            return false;
        }

        return true;
    }

    public function create(string $key): Url
    {
        return new Url($key);
    }
}
