<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitCommentsUrl;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommitCommentsUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($commentsUrl = 'commentsUrl');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitCommentsUrl::class);
    }


    public function it_exposes_commentsUrl()
    {
        $this->getCommentsUrl()->shouldReturn('commentsUrl');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('commentsUrl');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('commentsUrl');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('commentsUrl')->shouldReturnAnInstanceOf(CommitCommentsUrl::class);
    }
}
