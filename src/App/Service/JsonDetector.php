<?php

declare(strict_types=1);

namespace App\Service;

use App\Service\JsonDetector\Factory;
use Webmozart\Assert\Assert;

/**
 * @see JsonDetectorSpec
 * @see JsonDetectorTest
 */
class JsonDetector
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

    public function detect(array $data, string $baseName, string $namespace): Config
    {
        $config = new Config($baseName, $namespace, []);

        foreach ($data as $key => $value) {
            $config->addKey($key);

            if (is_array($value)) {
                $subConfig = $this->detect($value, $key, $namespace.'\\'.ucfirst($config->getBaseName()));
                $config->addConfig($key, $subConfig);
            } else {
                foreach ($this->factories as $factory) {
                    if (true === $factory->isSatisfiedBy($key, $value)) {
                        $config->addSuggestion($key, $factory->create($key));
                    }
                }
            }
        }

        return $config;
    }
}
