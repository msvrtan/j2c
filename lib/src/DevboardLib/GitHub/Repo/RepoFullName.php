<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

class RepoFullName
{
    /** @var string */
    private $fullName;


    public function __construct(string $fullName)
    {
        $this->fullName = $fullName;
    }


    public function getFullName(): string
    {
        return $this->fullName;
    }


    public function __toString(): string
    {
        return $this->fullName;
    }


    public function serialize(): string
    {
        return $this->fullName;
    }


    public static function deserialize(string $fullName): self
    {
        return new self($fullName);
    }
}
