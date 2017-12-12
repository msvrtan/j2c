<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountHtmlUrl;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AccountHtmlUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($htmlUrl = 'htmlUrl');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(AccountHtmlUrl::class);
    }


    public function it_exposes_htmlUrl()
    {
        $this->getHtmlUrl()->shouldReturn('htmlUrl');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('htmlUrl');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('htmlUrl');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('htmlUrl')->shouldReturnAnInstanceOf(AccountHtmlUrl::class);
    }
}
