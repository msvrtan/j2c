<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\User;

/**
 * @see \spec\DevboardLib\GitHub\User\UserLoginSpec
 * @see \Tests\DevboardLib\GitHub\User\UserLoginTest
 */
class UserLogin
{
    /** @var string */
    private $login;


    public function __construct(string $login)
    {
        $this->login = $login;
    }


    public function getLogin(): string
    {
        return $this->login;
    }


    public function __toString(): string
    {
        return $this->login;
    }


    public function serialize(): string
    {
        return $this->login;
    }


    public static function deserialize(string $login): self
    {
        return new self($login);
    }
}
