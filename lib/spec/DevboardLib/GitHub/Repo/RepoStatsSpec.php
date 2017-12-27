<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoStats;
use DevboardLib\GitHub\Repo\RepoStats\RepoSize;
use PhpSpec\ObjectBehavior;

class RepoStatsSpec extends ObjectBehavior
{
    public function let(RepoSize $size)
    {
        $this->beConstructedWith($networkCount = 1, $watchersCount = 1, $stargazersCount = 1, $subscribersCount = 1, $openIssuesCount = 1, $size);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoStats::class);
    }


    public function it_exposes_network_count()
    {
        $this->getNetworkCount()->shouldReturn(1);
    }


    public function it_exposes_id(RepoSize $size)
    {
        $this->getId()->shouldReturn($size);
    }


    public function it_exposes_watchers_count()
    {
        $this->getWatchersCount()->shouldReturn(1);
    }


    public function it_exposes_stargazers_count()
    {
        $this->getStargazersCount()->shouldReturn(1);
    }


    public function it_exposes_subscribers_count()
    {
        $this->getSubscribersCount()->shouldReturn(1);
    }


    public function it_exposes_open_issues_count()
    {
        $this->getOpenIssuesCount()->shouldReturn(1);
    }


    public function it_exposes_size(RepoSize $size)
    {
        $this->getSize()->shouldReturn($size);
    }


    public function it_can_be_serialized(RepoSize $size)
    {
        $size->serialize()->shouldBeCalled()->willReturn(1);
        $this->serialize()->shouldReturn(['networkCount' => 1, 'watchersCount' => 1, 'stargazersCount' => 1, 'subscribersCount' => 1, 'openIssuesCount' => 1, 'size' => 1]);
    }


    public function it_can_be_deserialized(RepoSize $size)
    {
        $this->deserialize(['networkCount' => 1, 'watchersCount' => 1, 'stargazersCount' => 1, 'subscribersCount' => 1, 'openIssuesCount' => 1, 'size' => 1])->shouldReturnAnInstanceOf(RepoStats::class);
    }
}
