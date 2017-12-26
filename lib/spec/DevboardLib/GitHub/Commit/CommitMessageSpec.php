<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitMessage;
use PhpSpec\ObjectBehavior;

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


    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('message');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('message');
    }


    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('message');
    }


    public function it_can_be_deserialized()
    {
        $this->deserialize('message')->shouldReturnAnInstanceOf(CommitMessage::class);
    }
}
