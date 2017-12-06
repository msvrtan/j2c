<?php

declare(strict_types=1);

namespace MyVendor\User;

use DateTime;

class UserCreatedAt extends DateTime
{
    public function __toString(): string
    {
        return $this->format('c');
    }


    public static function createFromFormat($format, $time, $object = null): self
    {
        $date = parent::createFromFormat($format, $time, $object);

        return new self($date->format('c'));
    }


    public function serialize(): string
    {
        return $this->__toString();
    }


    public static function deserialize(string $value): self
    {
        return new self($value);
    }
}
