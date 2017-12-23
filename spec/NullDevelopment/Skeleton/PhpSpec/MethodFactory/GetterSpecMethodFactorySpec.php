<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\Skeleton\PhpSpec\Method\GetterSpecMethod;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\GetterSpecMethodFactory;
use NullDevelopment\Skeleton\PhpSpecMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use PhpSpec\ObjectBehavior;

class GetterSpecMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GetterSpecMethodFactory::class);
        $this->shouldImplement(PhpSpecMethodFactory::class);
    }

    public function it_creates_getter_spec_method_from_given_getter_method(GetterMethod $method, Property $firstName)
    {
        $method->getName()->shouldBeCalled()->willReturn('getFirstName');
        $method->getPropertyName()->shouldBeCalled()->willReturn('firstName');
        $method->getProperty()->shouldBeCalled()->willReturn($firstName);

        $this->createFromGetterMethod($method)
            ->shouldReturnAnInstanceOf(GetterSpecMethod::class);
    }

    public function it_creates_nice_spec_method_name(GetterMethod $method, Property $firstName)
    {
        $method->getName()->shouldBeCalled()->willReturn('getFirstName');
        $method->getPropertyName()->shouldBeCalled()->willReturn('firstName');
        $method->getProperty()->shouldBeCalled()->willReturn($firstName);

        $result = $this->createFromGetterMethod($method);
        $result->getName()->shouldReturn('it_exposes_first_name');
    }
}
