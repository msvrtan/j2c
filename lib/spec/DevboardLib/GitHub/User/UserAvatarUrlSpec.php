<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\UserAvatarUrl;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserAvatarUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($avatarUrl = 'avatarUrl');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(UserAvatarUrl::class);
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
        $this->deserialize('avatarUrl')->shouldReturnAnInstanceOf(UserAvatarUrl::class);
    }
}
