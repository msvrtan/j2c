<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

class CommitCommentsUrl
{
    /** @var string */
    private $commentsUrl;


    public function __construct(string $commentsUrl)
    {
        $this->commentsUrl = $commentsUrl;
    }


    public function getCommentsUrl(): string
    {
        return $this->commentsUrl;
    }


    public function __toString(): string
    {
        return $this->commentsUrl;
    }


    public function serialize(): string
    {
        return $this->commentsUrl;
    }


    public static function deserialize(string $commentsUrl): self
    {
        return new self($commentsUrl);
    }
}
