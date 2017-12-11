<?php

declare(strict_types=1);

namespace ConfigToDefinition;

use Exception;
use JsonToConfig\JsonDetector\ValueObject\Generix\EmailAddress;
use JsonToConfig\JsonDetector\ValueObject\Generix\Url;
use JsonToConfig\JsonDetector\ValueObject\Id\IntegerId;
use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleBool;
use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleCollection;
use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleDateTime;
use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleInteger;
use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleString;
use NullDevelopment\Skeleton\Php\Method\ConstructorMethod;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\Php\Structure\CollectionOf;
use NullDevelopment\Skeleton\Php\Structure\MethodParameter;
use NullDevelopment\Skeleton\Php\Structure\Property;
use NullDevelopment\Skeleton\SourceCode\Definition;
use NullDevelopment\Skeleton\SourceCode\Definition\DateTimeValueObject;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleEntity;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleIdentifier;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleValueObject;

/**
 * @see ConfigConverterSpec
 * @see ConfigConverterTest
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ConfigConverter
{
    /** @SuppressWarnings(PHPMD.CyclomaticComplexity) */
    public function convert(array $input)
    {
        $results = [];

        if ((false === array_key_exists('suggestions', $input))
            || (true === empty($input['suggestions']) && false === empty($input['fields']))
        ) {
            $parameters = $this->processFieldsToConstructorParameters($input['fields']);
            $properties = $this->processFieldsToProperties($input['fields']);

            $className = new ClassName($input['name'], $input['namespace']);

            if (true === empty($parameters)) {
                $constructor = null;
            } else {
                $constructor = new ConstructorMethod($parameters);
            }

            $results[] = new SimpleEntity($className, null, [], [], $constructor, $properties);
            foreach ($input['fields'] as $field) {
                $results = array_merge($results, $this->convert($field));
            }

            return $results;
        }

        $suggestion = array_shift($input['suggestions']);

        if (IntegerId::class === $suggestion) {
            $results[] = $this->createSimpleIdentifier($input);
        } elseif (SimpleInteger::class === $suggestion) {
            $results[] = $this->createSimpleIntegerValueObject($input);
        } elseif (SimpleString::class === $suggestion || null === $suggestion) {
            $results[] = $this->createSimpleStringValueObject($input);
        } elseif (Url::class === $suggestion) {
            $results[] = $this->createSimpleStringValueObject($input);
        } elseif (EmailAddress::class === $suggestion) {
            $results[] = $this->createSimpleStringValueObject($input);
        } elseif (SimpleBool::class === $suggestion) {
            $results[] = $this->createSimpleBoolValueObject($input);
        } elseif (SimpleDateTime::class === $suggestion) {
            $results[] = $this->createSimpleDateTimeValueObject($input);
        } elseif (SimpleCollection::class === $suggestion) {
            $results[] = $this->createSimpleCollection($input);
        } else {
            throw new Exception('@TODO:'.$suggestion);
        }

        return $results;
    }

    private function createSimpleIdentifier(array $input)
    {
        $className   = new ClassName($input['name'], $input['namespace']);
        $constructor = new ConstructorMethod([new MethodParameter('id', new ClassName('int'))]);
        $properties  = [Property::privateProperty('id', new ClassName('int'))];

        return new SimpleIdentifier($className, null, [], [], $constructor, $properties);
    }

    private function createSimpleStringValueObject(array $input)
    {
        $className   = new ClassName($input['name'], $input['namespace']);
        $constructor = new ConstructorMethod([new MethodParameter(lcfirst($input['name']), new ClassName('string'))]);
        $properties  = [Property::privateProperty(lcfirst($input['name']), new ClassName('string'))];

        return new SimpleValueObject($className, null, [], [], $constructor, $properties);
    }

    private function createSimpleIntegerValueObject(array $input)
    {
        $className   = new ClassName($input['name'], $input['namespace']);
        $constructor = new ConstructorMethod([new MethodParameter(lcfirst($input['name']), new ClassName('int'))]);
        $properties  = [Property::privateProperty(lcfirst($input['name']), new ClassName('int'))];

        return new SimpleValueObject($className, null, [], [], $constructor, $properties);
    }

    private function createSimpleBoolValueObject(array $input)
    {
        $className = new ClassName($input['name'], $input['namespace']);

        $constructor = new ConstructorMethod([new MethodParameter(lcfirst($input['name']), new ClassName('bool'))]);
        $properties  = [Property::privateProperty(lcfirst($input['name']), new ClassName('bool'))];

        return new SimpleValueObject($className, null, [], [], $constructor, $properties);
    }

    private function createSimpleDateTimeValueObject(array $input)
    {
        $className = new ClassName($input['name'], $input['namespace']);

        $parent = new ClassName('DateTime');

        $constructor = new ConstructorMethod([new MethodParameter('value', new ClassName('string'))]);
        $properties  = [Property::privateProperty('value', new ClassName('string'))];

        return new DateTimeValueObject($className, $parent, [], [], $constructor, $properties);
    }

    private function createSimpleCollection(array $input)
    {
        $className = new ClassName($input['name'], $input['namespace']);

        $constructor = new ConstructorMethod(
            [new MethodParameter('elements', new ClassName('array'), false, true, '[]')]
        );

        $collectionOf = new CollectionOf(
            new ClassName($input['collectionOf']['className']),
            'getId',
            new ClassName($input['collectionOf']['has'])
        );

        return new Definition\SimpleCollection($className, null, [], [], $constructor, [], $collectionOf);
    }

    private function processFieldsToConstructorParameters(array $fields): array
    {
        $parameters = [];
        foreach ($fields as $key => $item) {
            $name      = lcfirst(str_replace('_', '', ucwords($key, '_')));
            $className = new ClassName($item['name'], $item['namespace']);

            $parameters[] = new MethodParameter($name, $className);
        }

        return $parameters;
    }

    private function processFieldsToProperties(array $fields): array
    {
        $properties = [];
        foreach ($fields as $key => $item) {
            $name      = lcfirst(str_replace('_', '', ucwords($key, '_')));
            $className = new ClassName($item['name'], $item['namespace']);

            $properties[] = Property::privateProperty($name, $className);
        }

        return $properties;
    }
}
