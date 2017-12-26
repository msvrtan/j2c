<?php

declare(strict_types=1);

namespace spec\MyVendor\User;

use MyVendor\User\Username;
use PhpSpec\ObjectBehavior;

class UsernameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($value = 'value');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(Username::class);
    }


    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('value');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('value');
    }


    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('value');
    }


    public function it_can_be_deserialized()
    {
        $this->deserialize('value')->shouldReturnAnInstanceOf(Username::class);
    }
}
