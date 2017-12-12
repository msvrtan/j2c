<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountAvatarUrl;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AccountAvatarUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($avatarUrl = 'avatarUrl');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(AccountAvatarUrl::class);
    }


    public function it_exposes_avatarUrl()
    {
        $this->getAvatarUrl()->shouldReturn('avatarUrl');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('avatarUrl');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('avatarUrl');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('avatarUrl')->shouldReturnAnInstanceOf(AccountAvatarUrl::class);
    }
}
