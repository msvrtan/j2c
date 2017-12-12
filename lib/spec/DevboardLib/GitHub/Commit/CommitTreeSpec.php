<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitTree;
use DevboardLib\GitHub\Commit\Tree\TreeSha;
use DevboardLib\GitHub\Commit\Tree\TreeUrl;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommitTreeSpec extends ObjectBehavior
{
    public function let(TreeSha $sha, TreeUrl $url)
    {
        $this->beConstructedWith($sha, $url);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitTree::class);
    }


    public function it_exposes_sha(TreeSha $sha)
    {
        $this->getSha()->shouldReturn($sha);
    }


    public function it_exposes_url(TreeUrl $url)
    {
        $this->getUrl()->shouldReturn($url);
    }


    public function it_is_serializable(TreeSha $sha, TreeUrl $url)
    {
        $sha->serialize()->shouldBeCalled()->willReturn('sha');
        $url->serialize()->shouldBeCalled()->willReturn('url');
        $this->serialize()->shouldReturn(['sha' => 'sha', 'url' => 'url']);
    }


    public function it_is_deserializable()
    {
        $this->deserialize(['sha' => 'sha', 'url' => 'url'])->shouldReturnAnInstanceOf(CommitTree::class);
    }
}
