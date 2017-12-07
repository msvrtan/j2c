<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware;

use DateTime;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\Php\Structure\Property;
use NullDevelopment\SkeletonNetteGenerator\PartialCodeGeneratorMiddleware;
use ReflectionClass;

class SpecSerializationMiddleware implements PartialCodeGeneratorMiddleware
{
    public function execute($definition, callable $next)
    {
        /** @var PhpNamespace $namespace */
        $namespace = $next($definition);

        /** @var ClassType $class */
        foreach ($namespace->getClasses() as $class) {
            $input = null;

            if (1 === count($definition->getProperties())) {
                /* @var Property $property */
                foreach ($definition->getProperties() as $property) {
                    $input = $property->suggestValue();
                }
            } else {
                /* @var Property $property */
                foreach ($definition->getProperties() as $property) {
                    $input[] = sprintf("'%s' => %s", $property->getName(), $this->suggestValue($property));
                }

                $input = '['.implode(', ', $input).']';
            }

            $serializeMethod = $class->addMethod('it_is_serializable');

            $deserializeBody = sprintf(
                '$this->deserialize(%s)->shouldReturnAnInstanceOf(%s::class);',
                $input,
                $definition->getClassName()
            );

            $class->addMethod('it_is_deserializable')
                ->addBody($deserializeBody);

            foreach ($definition->getProperties() as $property) {
                if (false === in_array($property->getStructureFullName(), ['int', 'string', 'float', 'bool', 'array', 'DateTime'])) {
                    $namespace->addUse($property->getStructureFullName());

                    $serializeMethod->addParameter($property->getName())
                        ->setTypeHint($property->getStructureFullName());

                    $serializeMethod->addBody(
                        sprintf(
                            '$%s->serialize()->shouldBeCalled()->willReturn(%s);',
                            $property->getName(),
                            $this->suggestValue($property)
                        )
                    );
                } elseif ('DateTime' === $property->getStructureFullName()) {
                    $namespace->addUse($property->getStructureFullName());

                    $serializeMethod->addParameter($property->getName())
                        ->setTypeHint($property->getStructureFullName());

                    $serializeMethod->addBody(
                        sprintf(
                            '$%s->format(\'c\')->shouldBeCalled()->willReturn(%s);',
                            $property->getName(),
                            "'2018-03-04 14:15:16'"
                        )
                    );
                }
            }

            $serializeMethod->addBody(sprintf('$this->serialize()->shouldReturn(%s);', $input));
        }

        return $namespace;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    private function suggestValue(Property $property)
    {
        if ('string' === $property->getStructureFullName()) {
            return "'".$property->getName()."'";
        } elseif ('int' === $property->getStructureFullName()) {
            return 1;
        } elseif ('float' === $property->getStructureFullName()) {
            return 2.0;
        } elseif ('bool' === $property->getStructureFullName()) {
            return true;
        } elseif ('array' === $property->getStructureFullName()) {
            return ['data'];
        } elseif ('DateTime' === $property->getStructureFullName()) {
            return "'2018-03-04 14:15:16'";
        }
        $refl = new ReflectionClass($property->getStructureFullName());

        while ($parent = $refl->getParentClass()) {
            if (DateTime::class === $parent->getName()) {
                return "'2018-02-03 12:23:34'";
            }
        }

        $zzz = [];
        foreach ($refl->getConstructor()->getParameters() as $parameter) {
            if (null !== $parameter->getType()) {
                $type = $parameter->getType()->__toString();

                if ('string' === $type) {
                    $zzz[] = "'".$property->getName()."'";
                } elseif ('int' === $type) {
                    $zzz[] = 1;
                } elseif ('float' === $type) {
                    $zzz[] = 2.0;
                } elseif ('bool' === $type) {
                    $zzz[] = true;
                } elseif ('array' === $type) {
                    $zzz[] = ['data'];
                } else {
                    $zzz[] = "'".$property->getName()."'";
                }
            } else {
                $zzz[] = "'".$property->getName()."'";
            }
        }

        if (count($zzz) > 1) {
            return '['.implode(', ', $zzz).']';
        }

        return implode(', ', $zzz);
    }
}
