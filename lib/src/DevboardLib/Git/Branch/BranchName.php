<?php

declare(strict_types=1);

namespace DevboardLib\Git\Branch;

/**
 * @see \spec\DevboardLib\Git\Branch\BranchNameSpec
 * @see \Tests\DevboardLib\Git\Branch\BranchNameTest
 */
class BranchName
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
