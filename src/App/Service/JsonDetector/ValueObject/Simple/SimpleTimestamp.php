<?php

declare(strict_types=1);

namespace App\Service\JsonDetector\ValueObject\Simple;

use App\Service\JsonDetector\ValueObject;

/**
 * @see SimpleTimestampSpec
 * @see SimpleTimestampTest
 */
class SimpleTimestamp implements ValueObject
{
    /** @var string */
    private $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function getPriority(): int
    {
        return ValueObject::NORMAL;
    }

    public function getSorting(): int
    {
        return 5;
    }
}
