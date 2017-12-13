<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

/**
 * @see \spec\DevboardLib\GitHub\Commit\CommitShaSpec
 * @see \Tests\DevboardLib\GitHub\Commit\CommitShaTest
 */
class CommitSha
{
    /** @var string */
    private $sha;


    public function __construct(string $sha)
    {
        $this->sha = $sha;
    }


    public function getSha(): string
    {
        return $this->sha;
    }


    public function __toString(): string
    {
        return $this->sha;
    }


    public function serialize(): string
    {
        return $this->sha;
    }


    public static function deserialize(string $sha): self
    {
        return new self($sha);
    }
}
