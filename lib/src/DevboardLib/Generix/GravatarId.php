<?php

declare(strict_types=1);

namespace DevboardLib\Generix;

class GravatarId
{
    /** @var string */
    private $gravatarId;


    public function __construct(string $gravatarId)
    {
        $this->gravatarId = $gravatarId;
    }


    public function getGravatarId(): string
    {
        return $this->gravatarId;
    }


    public function getValue(): string
    {
        return $this->gravatarId;
    }


    public function __toString(): string
    {
        return $this->gravatarId;
    }


    public function serialize(): string
    {
        return $this->gravatarId;
    }


    public static function deserialize(string $gravatarId): self
    {
        return new self($gravatarId);
    }
}
