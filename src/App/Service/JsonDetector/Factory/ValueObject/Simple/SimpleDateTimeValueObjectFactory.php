<?php

declare(strict_types=1);

namespace App\Service\JsonDetector\Factory\ValueObject\Simple;

use App\Service\JsonDetector\Factory;
use App\Service\JsonDetector\ValueObject\Simple\SimpleDateTime;
use DateTime;

/**
 * @see SimpleDateTimeValueObjectFactorySpec
 * @see SimpleDateTimeValueObjectFactoryTest
 */
class SimpleDateTimeValueObjectFactory implements Factory
{
    private $formats = [
        'Y-m-d H:i:s',
        'Y-m-d\TH:i:sP',
        //'U',
    ];

    public function isSatisfiedBy(string $key, $value): bool
    {
        if (false === is_string($value)) {
            return false;
        }

        if (null !== $this->detectFormat($value)) {
            return true;
        }

        return false;
    }

    public function create(string $key): SimpleDateTime
    {
        return new SimpleDateTime($key);
    }

    public function detectFormat(string $value): ?string
    {
        foreach ($this->formats as $format) {
            $info = date_parse_from_format($format, $value);

            if (0 === $info['error_count'] && 0 === $info['warning_count']) {
                return $format;
            }
        }

        return null;
    }

    public function guessFormatAndCreateDateTime($value)
    {
        $format = $this->detectFormat((string) $value);

        if (null === $format) {
            return null;
        }

        return DateTime::createFromFormat($format, $value);
    }
}
