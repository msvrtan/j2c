<?php

declare(strict_types=1);

namespace App\Service\JsonDetector;

interface Factory
{
    public function isSatisfiedBy(string $key, $value): bool;

    /**
     * @return ValueObject
     */
    public function create(string $key);
}
