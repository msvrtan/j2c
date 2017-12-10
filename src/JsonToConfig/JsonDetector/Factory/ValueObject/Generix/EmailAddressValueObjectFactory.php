<?php

declare(strict_types=1);

namespace JsonToConfig\JsonDetector\Factory\ValueObject\Generix;

use JsonToConfig\JsonDetector\Factory;
use JsonToConfig\JsonDetector\ValueObject\Generix\EmailAddress;

/**
 * @see EmailAddressValueObjectFactorySpec
 * @see EmailAddressValueObjectFactoryTest
 */
class EmailAddressValueObjectFactory implements Factory
{
    public function isSatisfiedBy(string $key, $value): bool
    {
        if (false === is_string($value)) {
            return false;
        }

        if (false === filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    public function create(string $key): EmailAddress
    {
        return new EmailAddress($key);
    }
}
