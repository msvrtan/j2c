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
    private $configs  = [];
    /** @var string */
    private $baseName;
    /** @var string */
    private $namespace;

    public function __construct(string $baseName, string $namespace, array $data = [])
    {
        $this->baseName  = str_replace('_', '', ucwords($baseName, '_'));
        $this->namespace = $namespace;
        foreach ($data as $key => $suggestions) {
            foreach ($suggestions as $suggestion) {
                $this->addSuggestion($key, $suggestion);
            }
        }
    }

    public function getBaseName(): string
    {
        return $this->baseName;
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function addKey($key)
    {
        if (false === array_key_exists($key, $this->elements)) {
            $this->elements[$key] = [];
        }
    }

    public function addConfig($key, $config)
    {
        $this->configs[$key] = $config;
    }

    public function addSuggestion($key, $item)
    {
        $this->addKey($key);

        $this->elements[$key][] = $item;

        usort(
            $this->elements[$key],
            function ($first, $second) {
                return $second->getPriority() <=> $first->getPriority();
            }
        );
    }

    public function toArray($input = ''): array
    {
        $result = [
            'key'       => $this->baseName,
            'name'      => $this->baseName,
            'namespace' => $this->namespace,
            'inputKey'  => $input,
            'sorting'   => 16,
        ];

        foreach ($this->elements as $key => $list) {
            $resultItem = [
                'key'         => $key,
                'name'        => $this->baseName.str_replace('_', '', ucwords($key, '_')),
                'namespace'   => $this->namespace.'\\'.$this->baseName,
                'inputKey'    => $input.'["'.$key.'"]',
                'suggestions' => [],
                'sorting'     => 0,
            ];
            foreach ($list as $item) {
                $resultItem['suggestions'][] = get_class($item);
                if (0 === $resultItem['sorting']) {
                    $resultItem['sorting'] = $item->getSorting();
                }
            }
            if (true === array_key_exists($key, $this->configs)) {
                $resultItem = array_merge($resultItem, $this->configs[$key]->toArray($input.'["'.$key.'"]'));
            }

            $result['fields'][$key] = $resultItem;
        }

        if (true === array_key_exists('fields', $result)) {
            uasort(
                $result['fields'],
                function ($first, $second) {
                    $firstSorting = $first['sorting'];
                    $secondSorting = $second['sorting'];

                    if ($secondSorting > $firstSorting) {
                        return 1;
                    } elseif ($secondSorting < $firstSorting) {
                        return -1;
                    }

                    return strcmp($first['key'], $second['key']);
                }
            );
        }

        return $result;
    }
}
