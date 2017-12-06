<?php

declare(strict_types=1);

namespace App\Service\JsonToConfig\ValueObject\Id;

use App\Service\JsonToConfig\ValueObject;

/**
 * @see UuidIdSpec
 * @see UuidIdTest
 */
class UuidId implements ValueObject
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
}
