<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RepoIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($id = 1);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoId::class);
    }


    public function it_exposes_id()
    {
        $this->getId()->shouldReturn(1);
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('1');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn(1);
    }


    public function it_is_deserializable()
    {
        $this->deserialize(1)->shouldReturnAnInstanceOf(RepoId::class);
    }
}
