<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoLanguage;
use PhpSpec\ObjectBehavior;

class RepoLanguageSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($language = 'language');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoLanguage::class);
    }


    public function it_exposes_language()
    {
        $this->getLanguage()->shouldReturn('language');
    }


    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('language');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('language');
    }


    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('language');
    }


    public function it_can_be_deserialized()
    {
        $this->deserialize('language')->shouldReturnAnInstanceOf(RepoLanguage::class);
    }
}
