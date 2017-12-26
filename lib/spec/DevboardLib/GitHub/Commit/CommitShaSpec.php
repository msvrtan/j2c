<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitSha;
use PhpSpec\ObjectBehavior;

class CommitShaSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($sha = 'sha');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitSha::class);
    }


    public function it_exposes_sha()
    {
        $this->getSha()->shouldReturn('sha');
    }


    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('sha');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('sha');
    }


    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('sha');
    }


    public function it_can_be_deserialized()
    {
        $this->deserialize('sha')->shouldReturnAnInstanceOf(CommitSha::class);
    }
}
