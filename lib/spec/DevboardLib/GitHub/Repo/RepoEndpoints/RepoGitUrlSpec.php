<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo\RepoEndpoints;

use DevboardLib\GitHub\Repo\RepoEndpoints\RepoGitUrl;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RepoGitUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($gitUrl = 'gitUrl');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoGitUrl::class);
    }


    public function it_exposes_gitUrl()
    {
        $this->getGitUrl()->shouldReturn('gitUrl');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('gitUrl');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('gitUrl');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('gitUrl')->shouldReturnAnInstanceOf(RepoGitUrl::class);
    }
}
