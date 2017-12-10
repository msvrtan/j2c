<?php

declare(strict_types=1);

namespace JsonToConfig;

use JsonToConfig\JsonDetector\Factory;
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

    public function detect(Config $config, array $data): Config
    {
        foreach ($data as $key => $value) {
            if (true === is_int($key)) {
                return $this->detect($config, $value);
            } else {
                $config->addKey($key);

                if (is_array($value)) {
                    $subConfig = new Config($key, $config->getNamespace().'\\'.ucfirst($config->getBaseName()), []);

                    $this->detect($subConfig, $value);
                    $config->addConfig($key, $subConfig);
                }
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
