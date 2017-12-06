<?php

declare(strict_types=1);

namespace App\Command;

use NullDevelopment\Skeleton\Php\ClassDefinition;
use NullDevelopment\Skeleton\Php\Method\ConstructorMethod;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\Php\Structure\InterfaceName;
use NullDevelopment\Skeleton\Php\Structure\MethodParameter;
use NullDevelopment\Skeleton\Php\Structure\Property;
use NullDevelopment\Skeleton\Php\Structure\TraitName;
use NullDevelopment\Skeleton\Php\Structure\Visibility;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Yaml\Yaml;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Test2Command extends ContainerAwareCommand
{
    protected static $defaultName = 'test:2';

    protected function configure()
    {
        $this
            ->setDescription('Test');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $path = getcwd().'/definitions/GitHubRepoId.yaml';
        $path = getcwd().'/definitions/UserId.yaml';

        $configData = Yaml::parse(file_get_contents($path))['definition'];

        //var_export($configData);

        $parent            = $this->extractParent($configData);
        $interfaces        = $this->extractInterfaces($configData);
        $traits            = $this->extractTraits($configData);
        $constructorMethod = $this->extractConstructorMethod($configData);
        $properties        = $this->extractProperties($configData);

        /*$classDefinition =*/
        new ClassDefinition(
            ClassName::createFromFullyQualified($configData['className']),
            $parent,
            $interfaces,
            $traits,
            $constructorMethod,
            $properties
        );

        //print_r($classDefinition);

        $io->writeln('Finished!');
    }

    private function extractParent(array $data): ?ClassName
    {
        if (false === array_key_exists('parent', $data)) {
            return null;
        }
        if (null === $data['parent']) {
            return null;
        }

        return ClassName::createFromFullyQualified($data['parent']);
    }

    private function extractInterfaces(array $data): array
    {
        if (false === array_key_exists('interfaces', $data)) {
            return [];
        }
        if (null === $data['interfaces']) {
            return [];
        }
        $interfaces = [];

        foreach ($data['interfaces'] as $interfaceName) {
            $interfaces[] = InterfaceName::createFromFullyQualified($interfaceName);
        }

        return $interfaces;
    }

    private function extractTraits(array $data): array
    {
        if (false === array_key_exists('traits', $data)) {
            return [];
        }
        if (null === $data['traits']) {
            return [];
        }

        $traits = [];

        foreach ($data['traits'] as $traitName) {
            $traits[] = TraitName::createFromFullyQualified($traitName);
        }

        return $traits;
    }

    private function extractConstructorMethod(array $data): ?ConstructorMethod
    {
        if (false === array_key_exists('constructor', $data)) {
            return null;
        }
        if (null === $data['constructor']) {
            return null;
        }

        $parameters = [];

        foreach ($data['constructor'] as $name => $parameter) {
            if (true === array_key_exists('nullable', $parameter)) {
                $nullable = $parameter['nullable'];
            } else {
                $nullable = false;
            }

            if (true === array_key_exists('hasDefault', $parameter)) {
                $hasDefault = $parameter['hasDefault'];
            } else {
                $hasDefault = false;
            }

            if (true === array_key_exists('default', $parameter)) {
                $default = $parameter['default'];
            } else {
                $default = null;
            }

            $parameters[] = new MethodParameter(
                $name,
                ClassName::createFromFullyQualified($parameter['className']),
                $nullable,
                $hasDefault,
                $default
            );
        }

        return new ConstructorMethod($parameters);
    }

    private function extractProperties(array $data): array
    {
        if (false === array_key_exists('properties', $data)) {
            return [];
        }
        if (null === $data['properties']) {
            return [];
        }

        $properties = [];

        foreach ($data['properties'] as $name => $property) {
            $properties[] = $this->extractProperty($name, $property);
        }

        return $properties;
    }

    private function extractProperty(string $name, array $data): Property
    {
        if (true === array_key_exists('nullable', $data)) {
            $nullable = $data['nullable'];
        } else {
            $nullable = false;
        }

        if (true === array_key_exists('hasDefault', $data)) {
            $hasDefault = $data['hasDefault'];
        } else {
            $hasDefault = false;
        }

        if (true === array_key_exists('default', $data)) {
            $default = $data['default'];
        } else {
            $default = null;
        }

        if (true === array_key_exists('visibility', $data)) {
            $visibility = new Visibility($data['visibility']);
        } else {
            $visibility = Visibility::PRIVATE();
        }

        if (true === array_key_exists('setter', $data)) {
            $setter = $data['setter'];
        } else {
            $setter = false;
        }

        if (true === array_key_exists('getter', $data)) {
            $getter = $data['getter'];
        } else {
            $getter = true;
        }

        return new Property(
            $name,
            ClassName::createFromFullyQualified($data['className']),
            $nullable,
            $hasDefault,
            $default,
            $visibility,
            $setter,
            $getter
        );
    }

    protected function getService(string $name)
    {
        return $this->getContainer()->get($name);
    }

    protected function loadJsonFile(string $fileName): array
    {
        $fileContent = file_get_contents($fileName);

        return json_decode($fileContent, true);
    }
}
