<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoMirrorUrl;
use PhpSpec\ObjectBehavior;

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


    public function it_exposes_mirror_url()
    {
        $this->getMirrorUrl()->shouldReturn('mirrorUrl');
    }


    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('mirrorUrl');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('mirrorUrl');
    }


    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('mirrorUrl');
    }


    public function it_can_be_deserialized()
    {
        $this->deserialize('mirrorUrl')->shouldReturnAnInstanceOf(RepoMirrorUrl::class);
    }
}
