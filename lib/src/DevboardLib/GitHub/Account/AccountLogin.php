<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Account;

/**
 * @see \spec\DevboardLib\GitHub\Account\AccountLoginSpec
 * @see \Tests\DevboardLib\GitHub\Account\AccountLoginTest
 */
class AccountLogin
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
