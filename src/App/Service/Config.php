<?php

declare(strict_types=1);

namespace App\Service;

/**
 * @see ConfigSpec
 * @see ConfigTest
 */
class Config
{
    private $elements = [];

    public function add($key, $list)
    {
        $this->elements[$key] = $list;
    }

    public function toArray(): array
    {
        $result = [];

        foreach ($this->elements as $key => $list) {
            $result[$key] = [];
            foreach ($list as $item) {
                $result[$key][] = get_class($item);
            }
        }

        return $result;
    }
}
