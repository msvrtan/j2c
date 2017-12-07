<?php

declare(strict_types=1);

namespace App\Service\JsonDetector\ValueObject\Simple;

use App\Service\JsonDetector\ValueObject;

/**
 * @see SimpleIntegerSpec
 * @see SimpleIntegerTest
 */
class SimpleInteger implements ValueObject
{
    /** @var string */
    private $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function getPriority(): int
    {
        return ValueObject::LOW;
    }
}
