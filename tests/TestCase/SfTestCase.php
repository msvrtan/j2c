<?php

declare(strict_types=1);

namespace Tests\TestCase;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Yaml\Yaml;

/** @SuppressWarnings("PHPMD.NumberOfChildren") */
abstract class SfTestCase extends KernelTestCase
{
    public function setUp()
    {
        self::bootKernel();
    }

    public function getService(string $serviceName)
    {
        return self::$kernel->getContainer()->get($serviceName);
    }

    protected function loadDefinitionYaml(string $fileName, ?string $path = null): array
    {
        // Define path
        if (null === $path) {
            $path = getcwd().'/definitions/'.$fileName;
        } else {
            $path .= '/'.$fileName;
        }

        // Load Yaml file content
        $fileContent = file_get_contents($path);

        // Parse content
        $parsedYaml = Yaml::parse($fileContent);

        // Return definition part.
        return $parsedYaml['definition'];
    }
}
