<?php

declare(strict_types=1);

namespace App\Service\JsonDetector\Factory\ValueObject\Simple;

use App\Service\JsonDetector\Factory;
use App\Service\JsonDetector\ValueObject\Simple\SimpleTimestamp;
use DateTime;

/**
 * @see SimpleTimestampValueObjectFactorySpec
 * @see SimpleTimestampValueObjectFactoryTest
 */
class SimpleTimestampValueObjectFactory implements Factory
{
    private $formats = [
        'U',
    ];

    public function isSatisfiedBy(string $key, $value): bool
    {
        if (true === is_array($value)) {
            return false;
        }

        if (null == $this->detectFormat((string) $value)) {
            return false;
        }

        if (100000000 < (int) $value) {
            return true;
        }

        return false;
    }

    public function create(string $key): SimpleTimestamp
    {
        return new SimpleTimestamp($key);
    }

    public function detectFormat($value): ?string
    {
        foreach ($this->formats as $format) {
            $info = date_parse_from_format($format, (string) $value);

            if (0 === $info['error_count'] && 0 === $info['warning_count']) {
                return $format;
            }
        }

        return null;
    }

    public function guessFormatAndCreateDateTime($value)
    {
        $format = $this->detectFormat($value);

        if (null === $format) {
            return null;
        }

        return DateTime::createFromFormat($format, (string) $value);
    }
}
