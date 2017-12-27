<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitParent;
use DevboardLib\GitHub\Commit\CommitParent\ParentApiUrl;
use DevboardLib\GitHub\Commit\CommitParent\ParentHtmlUrl;
use DevboardLib\GitHub\Commit\CommitSha;
use PhpSpec\ObjectBehavior;

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


    public function it_exposes_id(ParentHtmlUrl $htmlUrl)
    {
        $this->getId()->shouldReturn($htmlUrl);
    }


    public function it_exposes_api_url(ParentApiUrl $apiUrl)
    {
        $this->getApiUrl()->shouldReturn($apiUrl);
    }


    public function it_exposes_html_url(ParentHtmlUrl $htmlUrl)
    {
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('htmlUrl');
    }


    public function it_can_be_serialized(CommitSha $sha, ParentApiUrl $apiUrl, ParentHtmlUrl $htmlUrl)
    {
        $this->serialize()->shouldReturn(['sha' => 'sha', 'apiUrl' => 'apiUrl', 'htmlUrl' => 'htmlUrl']);
    }


    public function it_can_be_deserialized(CommitSha $sha, ParentApiUrl $apiUrl, ParentHtmlUrl $htmlUrl)
    {
        $this->deserialize(['sha' => 'sha', 'apiUrl' => 'apiUrl', 'htmlUrl' => 'htmlUrl'])->shouldReturnAnInstanceOf(CommitParent::class);
    }
}
