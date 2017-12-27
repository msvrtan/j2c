<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Branch;

use DevboardLib\GitHub\Branch\Protection\RequiredStatusChecks;

class Protection
{
    /** @var bool */
    private $enabled;

    /** @var RequiredStatusChecks */
    private $requiredStatusChecks;


    public function __construct(bool $enabled, RequiredStatusChecks $requiredStatusChecks)
    {
        $this->enabled = $enabled;
        $this->requiredStatusChecks = $requiredStatusChecks;
    }


    public function getEnabled(): bool
    {
        return $this->enabled;
    }


    public function getId(): RequiredStatusChecks
    {
        return $this->requiredStatusChecks;
    }


    public function getRequiredStatusChecks(): RequiredStatusChecks
    {
        return $this->requiredStatusChecks;
    }


    public function __toString(): string
    {
        return (string) $this->requiredStatusChecks;
    }


    public function serialize(): array
    {
        return [
            'enabled' => $this->enabled,
            'requiredStatusChecks' => $this->requiredStatusChecks->serialize()
        ];
    }


    public static function deserialize(array $data): self
    {
        return new self(
            $data['enabled'],
            RequiredStatusChecks::deserialize($data['requiredStatusChecks'])
        );
    }
}
