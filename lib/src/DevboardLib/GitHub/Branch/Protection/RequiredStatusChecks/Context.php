<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks;

use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks\Context\ContextId;

class Context
{
    /** @var ContextId */
    private $id;


    public function __construct(ContextId $id)
    {
        $this->id = $id;
    }


    public function getId(): ContextId
    {
        return $this->id;
    }


    public function __toString(): string
    {
        return (string) $this->id;
    }


    public function serialize(): int
    {
        return $this->id->serialize();
    }


    public static function deserialize(int $id): self
    {
        return new self(ContextId::deserialize($id));
    }
}
