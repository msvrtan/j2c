<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AccountTypeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($type = 'type');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(AccountType::class);
    }


    public function it_exposes_type()
    {
        $this->getType()->shouldReturn('type');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('type');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('type');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('type')->shouldReturnAnInstanceOf(AccountType::class);
    }
}
