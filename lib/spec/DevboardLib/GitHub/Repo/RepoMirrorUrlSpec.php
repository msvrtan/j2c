<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoMirrorUrl;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RepoMirrorUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($mirrorUrl = 'mirrorUrl');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoMirrorUrl::class);
    }


    public function it_exposes_mirrorUrl()
    {
        $this->getMirrorUrl()->shouldReturn('mirrorUrl');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('mirrorUrl');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('mirrorUrl');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('mirrorUrl')->shouldReturnAnInstanceOf(RepoMirrorUrl::class);
    }
}
