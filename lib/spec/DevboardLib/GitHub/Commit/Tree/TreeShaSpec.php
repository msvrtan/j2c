<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit\Tree;

use DevboardLib\GitHub\Commit\Tree\TreeSha;
use PhpSpec\ObjectBehavior;

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


    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('sha');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('sha');
    }


    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('sha');
    }


    public function it_can_be_deserialized()
    {
        $this->deserialize('sha')->shouldReturnAnInstanceOf(TreeSha::class);
    }
}
