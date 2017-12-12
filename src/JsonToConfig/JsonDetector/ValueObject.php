<?php

declare(strict_types=1);

namespace JsonToConfig\JsonDetector;

interface ValueObject
{
    const LOWEST = 10;
    const LOW    = 20;
    const NORMAL = 50;
    const HIGH   = 70;

    public function getPriority(): int;
}
