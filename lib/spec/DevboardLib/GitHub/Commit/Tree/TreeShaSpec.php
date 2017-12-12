<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit\Tree;

use DevboardLib\GitHub\Commit\Tree\TreeSha;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TreeShaSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($sha = 'sha');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(TreeSha::class);
    }


    public function it_exposes_sha()
    {
        $this->getSha()->shouldReturn('sha');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('sha');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('sha');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('sha')->shouldReturnAnInstanceOf(TreeSha::class);
    }
}
