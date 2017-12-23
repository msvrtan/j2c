<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\SourceCode\Definition\SingleValueObject;

/**
 * @see SingleValueObjectGeneratorSpec
 * @see SingleValueObjectGeneratorTest
 */
class SingleValueObjectGenerator extends BaseDefinitionGenerator
{
    public function supports(ClassType $definition): bool
    {
        if ($definition instanceof SingleValueObject) {
            return true;
        }

        return false;
    }
}
