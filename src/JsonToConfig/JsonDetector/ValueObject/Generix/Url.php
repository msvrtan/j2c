<?php

declare(strict_types=1);

namespace JsonToConfig\JsonDetector\ValueObject\Generix;

use JsonToConfig\JsonDetector\ValueObject;

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
