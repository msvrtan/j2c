<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoHomepage;
use PhpSpec\ObjectBehavior;

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


    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('homepage');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('homepage');
    }


    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('homepage');
    }


    public function it_can_be_deserialized()
    {
        $this->deserialize('homepage')->shouldReturnAnInstanceOf(RepoHomepage::class);
    }
}
