<?php

declare(strict_types=1);

namespace spec\DevboardLib\Git\Commit;

use DevboardLib\Git\Commit\CommitMessage;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommitMessageSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($message = 'message');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitMessage::class);
    }


    public function it_exposes_message()
    {
        $this->getMessage()->shouldReturn('message');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('message');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('message');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('message')->shouldReturnAnInstanceOf(CommitMessage::class);
    }
}
