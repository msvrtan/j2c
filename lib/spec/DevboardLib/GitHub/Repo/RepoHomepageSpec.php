<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoHomepage;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RepoHomepageSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($homepage = 'homepage');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoHomepage::class);
    }


    public function it_exposes_homepage()
    {
        $this->getHomepage()->shouldReturn('homepage');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('homepage');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('homepage');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('homepage')->shouldReturnAnInstanceOf(RepoHomepage::class);
    }
}
