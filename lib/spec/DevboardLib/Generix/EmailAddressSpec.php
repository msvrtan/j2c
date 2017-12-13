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
        $this->beConstructedWith($value = 'value');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(EmailAddress::class);
    }


    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('value');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('value');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('value');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('value')->shouldReturnAnInstanceOf(EmailAddress::class);
    }
}
