<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitApiUrl;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommitApiUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($apiUrl = 'apiUrl');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitApiUrl::class);
    }


    public function it_exposes_apiUrl()
    {
        $this->getApiUrl()->shouldReturn('apiUrl');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('apiUrl');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('apiUrl');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('apiUrl')->shouldReturnAnInstanceOf(CommitApiUrl::class);
    }
}
