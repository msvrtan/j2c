<?php

declare(strict_types=1);

namespace App\Service\JsonToConfig\Factory\ValueObject\Generix;

use App\Service\JsonToConfig\Factory;
use App\Service\JsonToConfig\ValueObject\Generix\Url;

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
