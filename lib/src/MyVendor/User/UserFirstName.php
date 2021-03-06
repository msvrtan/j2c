<?php

declare(strict_types=1);

namespace MyVendor\User;

class UserFirstName
{
    /** @var string */
    private $firstName;


    public function __construct(string $firstName)
    {
        $this->firstName = $firstName;
    }


    public function getFirstName(): string
    {
        return $this->firstName;
    }


    public function getValue(): string
    {
        return $this->firstName;
    }


    public function __toString(): string
    {
        return $this->firstName;
    }


    public function serialize(): string
    {
        return $this->firstName;
    }


    public static function deserialize(string $firstName): self
    {
        return new self($firstName);
    }
}
