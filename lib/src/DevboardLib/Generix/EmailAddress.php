<?php

declare(strict_types=1);

namespace DevboardLib\Generix;

class EmailAddress
{
    /** @var string */
    private $email;


    public function __construct(string $email)
    {
        $this->email = $email;
    }


    public function getEmail(): string
    {
        return $this->email;
    }


    public function getValue(): string
    {
        return $this->email;
    }


    public function __toString(): string
    {
        return $this->email;
    }


    public function serialize(): string
    {
        return $this->email;
    }


    public static function deserialize(string $email): self
    {
        return new self($email);
    }
}
