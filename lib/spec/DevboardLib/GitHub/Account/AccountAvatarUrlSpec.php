<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountAvatarUrl;
use PhpSpec\ObjectBehavior;

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


    public function it_exposes_avatar_url()
    {
        $this->getAvatarUrl()->shouldReturn('avatarUrl');
    }


    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('avatarUrl');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('avatarUrl');
    }


    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('avatarUrl');
    }


    public function it_can_be_deserialized()
    {
        $this->deserialize('avatarUrl')->shouldReturnAnInstanceOf(AccountAvatarUrl::class);
    }
}
