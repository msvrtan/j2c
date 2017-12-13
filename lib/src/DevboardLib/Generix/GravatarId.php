<?php

declare(strict_types=1);

namespace DevboardLib\Generix;

/**
 * @see \spec\DevboardLib\Generix\GravatarIdSpec
 * @see \Tests\DevboardLib\Generix\GravatarIdTest
 */
class GravatarId
{
    /** @var string */
    private $value;


    public function __construct(string $value)
    {
        $this->value = $value;
    }


    public function getValue(): string
    {
        return $this->value;
    }


    public function __toString(): string
    {
        return $this->value;
    }


    public function serialize(): string
    {
        return $this->value;
    }


    public static function deserialize(string $value): self
    {
        return new self($value);
    }
}
