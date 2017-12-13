<?php

declare(strict_types=1);

namespace DevboardLib\Generix;

/**
 * @see \spec\DevboardLib\Generix\EmailAddressSpec
 * @see \Tests\DevboardLib\Generix\EmailAddressTest
 */
class EmailAddress
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
