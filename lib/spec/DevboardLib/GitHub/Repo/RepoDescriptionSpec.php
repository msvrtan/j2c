<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoDescription;
use PhpSpec\ObjectBehavior;

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


    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('description');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('description');
    }


    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('description');
    }


    public function it_can_be_deserialized()
    {
        $this->deserialize('description')->shouldReturnAnInstanceOf(RepoDescription::class);
    }
}
