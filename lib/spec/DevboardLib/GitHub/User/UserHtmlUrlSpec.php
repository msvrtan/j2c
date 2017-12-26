<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\UserHtmlUrl;
use PhpSpec\ObjectBehavior;

class UserHtmlUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($htmlUrl = 'htmlUrl');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(UserHtmlUrl::class);
    }


    public function it_exposes_html_url()
    {
        $this->getHtmlUrl()->shouldReturn('htmlUrl');
    }


    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('htmlUrl');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('htmlUrl');
    }


    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('htmlUrl');
    }


    public function it_can_be_deserialized()
    {
        $this->deserialize('htmlUrl')->shouldReturnAnInstanceOf(UserHtmlUrl::class);
    }
}
