<?php

declare(strict_types=1);

namespace App\Service;

use App\Service\JsonToConfig\Factory;
use Webmozart\Assert\Assert;

/**
 * @see JsonToConfigSpec
 * @see JsonToConfigTest
 */
class JsonToConfig
{
    /**
     * @var Factory[]
     */
    private $factories;

    public function __construct(array $factories)
    {
        Assert::allIsInstanceOf($factories, Factory::class);

        $this->factories = $factories;
    }

    public function createConfig(array $data): array
    {
        $config = [];

        foreach ($data as $key => $value) {
            $list = [];

            foreach ($this->factories as $factory) {
                if (true === $factory->isSatisfiedBy($key, $value)) {
                    $list[] = $factory->create($key);
                }
            }

            usort($list, function ($a, $b) {
                return $b->getPriority() <=> $a->getPriority();
            });

            $config[$key] = $list;
        }

        return $config;
    }
}
