<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\Skeleton\PhpSpec\Method\LetMethod;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\LetMethodFactory;
use NullDevelopment\Skeleton\PhpSpecMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use PhpSpec\ObjectBehavior;

class LetMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(LetMethodFactory::class);
        $this->shouldImplement(PhpSpecMethodFactory::class);
    }

    public function it_creates_constructor_method_into_let_method(
        ConstructorMethod $constructorMethod,
        Property $property1
    ) {
        $constructorMethod->getParameters()->shouldBeCalled()->willReturn([$property1]);

        $this->createFromConstructorMethod($constructorMethod)
            ->shouldReturnAnInstanceOf(LetMethod::class);
    }
}
