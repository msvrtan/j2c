<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoFullName;
use PhpSpec\ObjectBehavior;

class RepoFullNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($fullName = 'fullName');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoFullName::class);
    }


    public function it_exposes_full_name()
    {
        $this->getFullName()->shouldReturn('fullName');
    }


    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('fullName');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('fullName');
    }


    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('fullName');
    }


    public function it_can_be_deserialized()
    {
        $this->deserialize('fullName')->shouldReturnAnInstanceOf(RepoFullName::class);
    }
}
