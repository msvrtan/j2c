<?php

declare(strict_types=1);

namespace App\Service\JsonDetector\ValueObject\Generix;

use App\Service\JsonDetector\ValueObject;

/**
 * @see UrlSpec
 * @see UrlTest
 */
class Url implements ValueObject
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
