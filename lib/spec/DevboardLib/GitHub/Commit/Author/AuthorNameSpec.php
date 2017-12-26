<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit\Author;

use DevboardLib\GitHub\Commit\Author\AuthorName;
use PhpSpec\ObjectBehavior;

class AuthorNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($name = 'name');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(AuthorName::class);
    }


    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('name');
    }


    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('name');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('name');
    }


    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('name');
    }


    public function it_can_be_deserialized()
    {
        $this->deserialize('name')->shouldReturnAnInstanceOf(AuthorName::class);
    }
}
