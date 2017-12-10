<?php

declare(strict_types=1);

namespace JsonToConfig\JsonDetector\ValueObject\Id;

use JsonToConfig\JsonDetector\ValueObject;

/**
 * @see IntegerIdSpec
 * @see IntegerIdTest
 */
class IntegerId implements ValueObject
{
    /** @var string */
    private $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function getPriority(): int
    {
        return ValueObject::HIGH;
    }

    public function getSorting(): int
    {
        return 200;
    }
}
