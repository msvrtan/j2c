<?php

declare(strict_types=1);

namespace spec\DevboardLib\Git\Commit;

use DevboardLib\GitHub\Commit\CommitParent\ParentApiUrl;
use DevboardLib\GitHub\Commit\CommitParent\ParentHtmlUrl;
use DevboardLib\GitHub\Commit\CommitSha;
use DevboardLib\GitHub\Commit\CommitParent;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommitParentSpec extends ObjectBehavior
{
    public function let(CommitSha $sha, ParentApiUrl $apiUrl, ParentHtmlUrl $htmlUrl)
    {
        $this->beConstructedWith($sha, $apiUrl, $htmlUrl);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitParent::class);
    }


    public function it_exposes_sha(CommitSha $sha)
    {
        $this->getSha()->shouldReturn($sha);
    }


    public function it_exposes_apiUrl(ParentApiUrl $apiUrl)
    {
        $this->getApiUrl()->shouldReturn($apiUrl);
    }


    public function it_exposes_htmlUrl(ParentHtmlUrl $htmlUrl)
    {
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
    }


    public function it_is_serializable(CommitSha $sha, ParentApiUrl $apiUrl, ParentHtmlUrl $htmlUrl)
    {
        $sha->serialize()->shouldBeCalled()->willReturn('sha');
        $apiUrl->serialize()->shouldBeCalled()->willReturn('apiUrl');
        $htmlUrl->serialize()->shouldBeCalled()->willReturn('htmlUrl');
        $this->serialize()->shouldReturn(['sha' => 'sha', 'apiUrl' => 'apiUrl', 'htmlUrl' => 'htmlUrl']);
    }


    public function it_is_deserializable()
    {
        $this->deserialize(['sha' => 'sha', 'apiUrl' => 'apiUrl', 'htmlUrl' => 'htmlUrl'])->shouldReturnAnInstanceOf(CommitParent::class);
    }
}
