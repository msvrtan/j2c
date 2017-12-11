<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteGenerator;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\Php\Structure\Visibility;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleCollection;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\LetMiddleware;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecGetterMiddleware;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecMiddleware;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecNamespaceMiddleware;
use NullDevelopment\SkeletonPhpSpecNetteGenerator\NetteMiddleware\SpecSerializationMiddleware;

/**
 * @see SimpleCollectionSpecNetteGeneratorSpec
 * @see SimpleCollectionSpecNetteGeneratorTest
 */
class SimpleCollectionSpecNetteGenerator extends BaseNetteGenerator
{
    public function __construct()
    {
        $middleware = [
            //new SpecSerializationMiddleware(new ExampleMaker()),
            //new SpecGetterMiddleware(new ExampleMaker()),
            //new LetMiddleware(new ExampleMaker()),
            new SpecMiddleware(),
            new SpecNamespaceMiddleware(),
        ];
        parent::__construct($middleware);
    }

    public function supports($definition): bool
    {
        if ($definition instanceof SimpleCollection) {
            return true;
        }

        return false;
    }

    public function generate(SimpleCollection $definition): PhpNamespace
    {
        $middlewareChain = $this->middlewareChain;
        $namespace       = $middlewareChain($definition);

        /** @var ClassType $class */
        foreach ($namespace->getClasses() as $class) {
            $variableName = lcfirst($definition->getCollectionOf()->getClassName()->getName());
            $variableType = $definition->getCollectionOf()->getClassName()->getFullName();

            $idName = lcfirst($definition->getCollectionOf()->getHas()->getName());
            $idType = $definition->getCollectionOf()->getHas()->getFullName();

            ///
            // Let
            $letMethod = $class->addMethod('let')
                ->setVisibility(Visibility::PUBLIC)
                ->addBody(sprintf('$this->beConstructedWith($elements = [$%s]);', $variableName));

            $letMethod->addParameter($variableName)
                ->setTypeHint($variableType);

            $namespace->addUse($variableType);
            $namespace->addUse($idType);

            ///
            // Initializable

            $class->addMethod('it_is_initializable')
                ->addBody('$this->shouldHaveType('.$definition->getClassName().'::class);');

            ///
            // Exposes elements

            $toArrayMethod = $class->addMethod('it_exposes_elements')
                ->setVisibility(Visibility::PUBLIC)
                ->addBody(sprintf('$this->toArray()->shouldReturn([$%s]);', $variableName));

            $toArrayMethod->addParameter($variableName)
                ->setTypeHint($variableType);

            ///
            // Count

            $class->addMethod('it_exposes_number_of_elements_in_collection')
                ->addBody('$this->count()->shouldReturn(1);');

            ///
            // Add

            $addMethod = $class->addMethod('it_supports_add_new_element')
                ->addBody(sprintf('$this->add($%s);', 'another'.ucfirst($variableName)))
                ->addBody('$this->count()->shouldReturn(2);');

            $addMethod->addParameter('another'.ucfirst($variableName))
                ->setTypeHint($variableType);

            ///
            // Has

            $hasMethod = $class->addMethod('it_knows_if_element_is_in_collection')
                ->addBody(sprintf('$%s->getId()->shouldBeCalled()->willReturn($%s);', $variableName, $idName))
                ->addBody(sprintf('$%s->getId()->shouldBeCalled()->willReturn(1);', $idName))
                ->addBody(sprintf('$this->has($%s)->shouldReturn(true);', $idName));

            $hasMethod->addParameter($variableName)
                ->setTypeHint($variableType);
            $hasMethod->addParameter($idName)
                ->setTypeHint($idType);

            ///
            // Get

            $getMethod = $class->addMethod('it_can_return_element_from_collection_by_given_id')
                ->addBody(sprintf('$%s->getId()->shouldBeCalled()->willReturn($%s);', $variableName, $idName))
                ->addBody(sprintf('$%s->getId()->shouldBeCalled()->willReturn(1);', $idName))
                ->addBody(sprintf('$this->get($%s)->shouldReturn($%s);', $idName, $variableName));

            $getMethod->addParameter($variableName)
                ->setTypeHint($variableType);
            $getMethod->addParameter($idName)
                ->setTypeHint($idType);
        }

        return $namespace;
    }
}
