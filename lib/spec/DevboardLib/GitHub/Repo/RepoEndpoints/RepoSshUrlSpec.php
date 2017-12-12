<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo\RepoEndpoints;

use DevboardLib\GitHub\Repo\RepoEndpoints\RepoSshUrl;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RepoSshUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($sshUrl = 'sshUrl');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoSshUrl::class);
    }


    public function it_exposes_sshUrl()
    {
        $this->getSshUrl()->shouldReturn('sshUrl');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('sshUrl');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('sshUrl');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('sshUrl')->shouldReturnAnInstanceOf(RepoSshUrl::class);
    }
}
