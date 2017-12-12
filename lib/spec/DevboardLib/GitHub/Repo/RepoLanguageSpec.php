<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoLanguage;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

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


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('language');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('language');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('language')->shouldReturnAnInstanceOf(RepoLanguage::class);
    }
}
