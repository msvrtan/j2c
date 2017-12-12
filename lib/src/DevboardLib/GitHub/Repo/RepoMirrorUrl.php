<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

class RepoMirrorUrl
{
    /** @var string */
    private $mirrorUrl;


    public function __construct(string $mirrorUrl)
    {
        $this->mirrorUrl = $mirrorUrl;
    }


    public function getMirrorUrl(): string
    {
        return $this->mirrorUrl;
    }


    public function __toString(): string
    {
        return $this->mirrorUrl;
    }


    public function serialize(): string
    {
        return $this->mirrorUrl;
    }


    public static function deserialize(string $mirrorUrl): self
    {
        return new self($mirrorUrl);
    }
}
