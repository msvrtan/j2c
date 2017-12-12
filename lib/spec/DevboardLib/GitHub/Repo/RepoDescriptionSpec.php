<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoDescription;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RepoDescriptionSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($description = 'description');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoDescription::class);
    }


    public function it_exposes_description()
    {
        $this->getDescription()->shouldReturn('description');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('description');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('description');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('description')->shouldReturnAnInstanceOf(RepoDescription::class);
    }
}
