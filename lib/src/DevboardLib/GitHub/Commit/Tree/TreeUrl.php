<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit\Tree;

class TreeUrl
{
    /** @var string */
    private $url;


    public function __construct(string $url)
    {
        $this->url = $url;
    }


    public function getUrl(): string
    {
        return $this->url;
    }


    public function getValue(): string
    {
        return $this->url;
    }


    public function __toString(): string
    {
        return $this->url;
    }


    public function serialize(): string
    {
        return $this->url;
    }


    public static function deserialize(string $url): self
    {
        return new self($url);
    }
}
