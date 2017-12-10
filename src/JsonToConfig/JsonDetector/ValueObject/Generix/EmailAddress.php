<?php

declare(strict_types=1);

namespace JsonToConfig\JsonDetector\ValueObject\Generix;

use JsonToConfig\JsonDetector\ValueObject;

/**
 * @see EmailAddressSpec
 * @see EmailAddressTest
 */
class EmailAddress implements ValueObject
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
        return 50;
    }
}
