<?php

declare(strict_types=1);

namespace App\Service\JsonToConfig\ValueObject\Simple;

use App\Service\JsonToConfig\ValueObject;

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
