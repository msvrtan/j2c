<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo\RepoEndpoints;

use DevboardLib\GitHub\Repo\RepoEndpoints\RepoGitUrl;
use PhpSpec\ObjectBehavior;

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


    public function it_exposes_git_url()
    {
        $this->getGitUrl()->shouldReturn('gitUrl');
    }


    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('gitUrl');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('gitUrl');
    }


    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('gitUrl');
    }


    public function it_can_be_deserialized()
    {
        $this->deserialize('gitUrl')->shouldReturnAnInstanceOf(RepoGitUrl::class);
    }
}
