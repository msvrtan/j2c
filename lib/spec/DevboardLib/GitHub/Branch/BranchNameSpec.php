<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Branch;

use DevboardLib\GitHub\Branch\BranchName;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BranchNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($name = 'name');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(BranchName::class);
    }


    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('name');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('name');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('name');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('name')->shouldReturnAnInstanceOf(BranchName::class);
    }
}
