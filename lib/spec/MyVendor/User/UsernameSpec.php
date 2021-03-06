<?php

declare(strict_types=1);

namespace spec\MyVendor\User;

use MyVendor\User\Username;
use PhpSpec\ObjectBehavior;

class UsernameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($username = 'username');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(Username::class);
    }


    public function it_exposes_username()
    {
        $this->getUsername()->shouldReturn('username');
    }


    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('username');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('username');
    }


    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('username');
    }


    public function it_can_be_deserialized()
    {
        $this->deserialize('username')->shouldReturnAnInstanceOf(Username::class);
    }
}
