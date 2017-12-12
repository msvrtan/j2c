<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoStats;
use DevboardLib\GitHub\Repo\RepoStats\RepoSize;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

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


    public function it_exposes_networkCount()
    {
        $this->getNetworkCount()->shouldReturn(1);
    }


    public function it_exposes_watchersCount()
    {
        $this->getWatchersCount()->shouldReturn(1);
    }


    public function it_exposes_stargazersCount()
    {
        $this->getStargazersCount()->shouldReturn(1);
    }


    public function it_exposes_subscribersCount()
    {
        $this->getSubscribersCount()->shouldReturn(1);
    }


    public function it_exposes_openIssuesCount()
    {
        $this->getOpenIssuesCount()->shouldReturn(1);
    }


    public function it_exposes_size(RepoSize $size)
    {
        $this->getSize()->shouldReturn($size);
    }


    public function it_is_serializable(RepoSize $size)
    {
        $size->serialize()->shouldBeCalled()->willReturn(1);
        $this->serialize()->shouldReturn(['networkCount' => 1, 'watchersCount' => 1, 'stargazersCount' => 1, 'subscribersCount' => 1, 'openIssuesCount' => 1, 'size' => 1]);
    }


    public function it_is_deserializable()
    {
        $this->deserialize(['networkCount' => 1, 'watchersCount' => 1, 'stargazersCount' => 1, 'subscribersCount' => 1, 'openIssuesCount' => 1, 'size' => 1])->shouldReturnAnInstanceOf(RepoStats::class);
    }
}
