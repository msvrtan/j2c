<?php

declare(strict_types=1);

namespace App\Service\JsonDetector\Factory\ValueObject\Generix;

use App\Service\JsonDetector\Factory;
use App\Service\JsonDetector\ValueObject\Generix\EmailAddress;

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
