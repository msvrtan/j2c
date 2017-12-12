<?php

declare(strict_types=1);

namespace spec\DevboardLib\Generix;

use DevboardLib\Generix\EmailAddress;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EmailAddressSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($email = 'email');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(EmailAddress::class);
    }


    public function it_exposes_email()
    {
        $this->getEmail()->shouldReturn('email');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('email');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('email');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('email')->shouldReturnAnInstanceOf(EmailAddress::class);
    }
}
