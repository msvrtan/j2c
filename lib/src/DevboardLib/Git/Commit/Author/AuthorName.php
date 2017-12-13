<?php

declare(strict_types=1);

namespace DevboardLib\Git\Commit\Author;

/**
 * @see \spec\DevboardLib\Git\Commit\Author\AuthorNameSpec
 * @see \Tests\DevboardLib\Git\Commit\Author\AuthorNameTest
 */
class AuthorName
{
    /** @var string */
    private $name;


    public function __construct(string $name)
    {
        $this->name = $name;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function __toString(): string
    {
        return $this->name;
    }


    public function serialize(): string
    {
        return $this->name;
    }


    public static function deserialize(string $name): self
    {
        return new self($name);
    }
}
