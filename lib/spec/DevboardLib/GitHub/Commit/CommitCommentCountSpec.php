<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitCommentCount;
use PhpSpec\ObjectBehavior;

class CommitCommentCountSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($commentCount = 1);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitCommentCount::class);
    }


    public function it_exposes_comment_count()
    {
        $this->getCommentCount()->shouldReturn(1);
    }


    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn(1);
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('1');
    }


    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn(1);
    }


    public function it_can_be_deserialized()
    {
        $this->deserialize(1)->shouldReturnAnInstanceOf(CommitCommentCount::class);
    }
}
