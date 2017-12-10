<?php

declare(strict_types=1);

namespace JsonToConfig\JsonDetector\ValueObject\Simple;

use JsonToConfig\JsonDetector\ValueObject;

/**
 * @see SimpleFloatSpec
 * @see SimpleFloatTest
 */
class SimpleFloat implements ValueObject
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

    public function getSorting(): int
    {
        return 30;
    }
}
