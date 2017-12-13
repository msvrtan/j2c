<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit\Tree;

/**
 * @see \spec\DevboardLib\GitHub\Commit\Tree\TreeUrlSpec
 * @see \Tests\DevboardLib\GitHub\Commit\Tree\TreeUrlTest
 */
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
