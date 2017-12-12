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


    public function serialize(): array
    {
        return [
            'id' => $this->id->serialize()
        ];
    }


    public static function deserialize(array $data): self
    {
        return new self(
            ContextId::deserialize($data['id'])
        );
    }
}
