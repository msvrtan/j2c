<?php

declare(strict_types=1);

namespace App\Service\JsonDetector;

interface ValueObject
{
    const LOWEST = 10;
    const LOW    = 20;
    const NORMAL = 50;
    const HIGH   = 70;

    public function getPriority(): int;

    public function getSorting(): int;
}
