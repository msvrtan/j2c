<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountLogin;
use PhpSpec\ObjectBehavior;

class AccountLoginSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($login = 'login');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(AccountLogin::class);
    }


    public function it_exposes_login()
    {
        $this->getLogin()->shouldReturn('login');
    }


    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('login');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('login');
    }


    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('login');
    }


    public function it_can_be_deserialized()
    {
        $this->deserialize('login')->shouldReturnAnInstanceOf(AccountLogin::class);
    }
}
