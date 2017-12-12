<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit\Tree;

use DevboardLib\GitHub\Commit\Tree\TreeUrl;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TreeUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($url = 'url');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(TreeUrl::class);
    }


    public function it_exposes_url()
    {
        $this->getUrl()->shouldReturn('url');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('url');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('url');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('url')->shouldReturnAnInstanceOf(TreeUrl::class);
    }
}
