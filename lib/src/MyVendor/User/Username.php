<?php

declare(strict_types=1);

namespace MyVendor\User;

class Username
{
    /** @var string */
    private $username;


    public function __construct(string $username)
    {
        $this->username = $username;
    }


    public function getUsername(): string
    {
        return $this->username;
    }


    public function getValue(): string
    {
        return $this->username;
    }


    public function __toString(): string
    {
        return $this->username;
    }


    public function serialize(): string
    {
        return $this->username;
    }


    public static function deserialize(string $username): self
    {
        return new self($username);
    }
}
