<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\Php\Structure\Visibility;
use NullDevelopment\Skeleton\SourceCode\Definition\DateTimeValueObject;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestNamespaceMiddleware;
use NullDevelopment\SkeletonPhpUnitNetteGenerator\NetteMiddleware\TestSerializationMiddleware;

/**
 * @see DateTimeValueObjectTestNetteGeneratorSpec
 * @see DateTimeValueObjectTestNetteGeneratorTest
 */
class DateTimeValueObjectTestNetteGenerator extends BaseNetteGenerator
{
    public function __construct()
    {
        $middleware = [
            new TestSerializationMiddleware(),
            new TestNamespaceMiddleware(),
        ];
        parent::__construct($middleware);
    }

    public function supports($definition): bool
    {
        if ($definition instanceof DateTimeValueObject) {
            return true;
        }

        return false;
    }

    public function generate(DateTimeValueObject $definition): PhpNamespace
    {
        $middlewareChain = $this->middlewareChain;
        $namespace       = $middlewareChain($definition);

        $class = $namespace->addClass($definition->getClassName().'Test');

        $class->setExtends('PHPUnit\\Framework\\TestCase');
        $namespace->addUse('PHPUnit\\Framework\\TestCase');
        $namespace->addUse($definition->getFullClassName());
        $class->addComment('@covers \\'.$definition->getFullClassName());
        $class->addComment('@group  todo');

        $class->addProperty('value')
            ->setVisibility(Visibility::PRIVATE)
            ->addComment('@var string');

        $class->addProperty('sut')
            ->setVisibility(Visibility::PRIVATE)
            ->addComment('@var '.$definition->getClassName());

        ///
        // Set up
        ///

        $setUpMethod = $class->addMethod('setUp')
            ->setVisibility(Visibility::PUBLIC);

        $setUpMethod->addBody(sprintf('$this->value = %s;', "'2018-01-01T11:22:33+00:00'"));
        $setUpMethod->addBody(sprintf('$this->sut = new %s($this->value);', $definition->getClassName()));

        ///
        // To string
        ///

        $class->addMethod('testToString')
            ->addBody('self::assertSame($this->value, $this->sut->__toString());');

        ///
        // Serialize / deserialize
        ///

        $class->addMethod('testSerialize')
            ->addBody('self::assertEquals($this->value, $this->sut->serialize());');

        $class->addMethod('testDeserialize')
            ->addBody('self::assertEquals($this->sut, $this->sut->deserialize($this->value));');

        return $namespace;
    }
}
