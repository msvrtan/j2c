<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

class CommitMessage
{
    /** @var string */
    private $message;


    public function __construct(string $message)
    {
        $this->message = $message;
    }


    public function getMessage(): string
    {
        return $this->message;
    }


    public function getValue(): string
    {
        return $this->message;
    }


    public function __toString(): string
    {
        return $this->message;
    }


    public function serialize(): string
    {
        return $this->message;
    }


    public static function deserialize(string $message): self
    {
        return new self($message);
    }
}
