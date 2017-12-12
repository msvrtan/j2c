<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo\RepoStats;

use DevboardLib\GitHub\Repo\RepoStats\RepoSize;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RepoSizeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($size = 1);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoSize::class);
    }


    public function it_exposes_size()
    {
        $this->getSize()->shouldReturn(1);
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
        $this->deserialize(1)->shouldReturnAnInstanceOf(RepoSize::class);
    }
}
