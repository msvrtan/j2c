<?php

declare(strict_types=1);

namespace spec\DevboardLib\Git\Commit\Committer;

use DevboardLib\Git\Commit\Committer\CommitterName;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommitterNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($name = 'name');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitterName::class);
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
        $this->deserialize('name')->shouldReturnAnInstanceOf(CommitterName::class);
    }
}
