<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

class RepoLanguage
{
    /** @var string */
    private $language;


    public function __construct(string $language)
    {
        $this->language = $language;
    }


    public function getLanguage(): string
    {
        return $this->language;
    }


    public function __toString(): string
    {
        return $this->language;
    }


    public function serialize(): string
    {
        return $this->language;
    }


    public static function deserialize(string $language): self
    {
        return new self($language);
    }
}
