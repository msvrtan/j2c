<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo\RepoEndpoints;

use DevboardLib\GitHub\Repo\RepoEndpoints\RepoApiUrl;
use PhpSpec\ObjectBehavior;

class RepoApiUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($url = 'url');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoApiUrl::class);
    }


    public function it_exposes_url()
    {
        $this->getUrl()->shouldReturn('url');
    }


    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('url');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('url');
    }


    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('url');
    }


    public function it_can_be_deserialized()
    {
        $this->deserialize('url')->shouldReturnAnInstanceOf(RepoApiUrl::class);
    }
}
