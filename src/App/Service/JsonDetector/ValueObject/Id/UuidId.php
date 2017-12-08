<?php

declare(strict_types=1);

namespace App\Service\JsonDetector\ValueObject\Id;

use App\Service\JsonDetector\ValueObject;

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

    public function getSorting(): int
    {
        return 200;
    }
}
