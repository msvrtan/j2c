<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountLogin;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

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


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('login');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('login');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('login')->shouldReturnAnInstanceOf(AccountLogin::class);
    }
}
