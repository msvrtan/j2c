<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoFullName;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

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


    public function it_exposes_fullName()
    {
        $this->getFullName()->shouldReturn('fullName');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('fullName');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('fullName');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('fullName')->shouldReturnAnInstanceOf(RepoFullName::class);
    }
}
