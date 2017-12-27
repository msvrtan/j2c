<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoCreatedAt;
use DevboardLib\GitHub\Repo\RepoPushedAt;
use DevboardLib\GitHub\Repo\RepoTimestamps;
use DevboardLib\GitHub\Repo\RepoUpdatedAt;
use PhpSpec\ObjectBehavior;

class RepoTimestampsSpec extends ObjectBehavior
{
    public function let(RepoCreatedAt $createdAt, RepoUpdatedAt $updatedAt, RepoPushedAt $pushedAt)
    {
        $this->beConstructedWith($createdAt, $updatedAt, $pushedAt);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoTimestamps::class);
    }


    public function it_exposes_created_at(RepoCreatedAt $createdAt)
    {
        $this->getCreatedAt()->shouldReturn($createdAt);
    }


    public function it_exposes_id(RepoPushedAt $pushedAt)
    {
        $this->getId()->shouldReturn($pushedAt);
    }


    public function it_exposes_updated_at(RepoUpdatedAt $updatedAt)
    {
        $this->getUpdatedAt()->shouldReturn($updatedAt);
    }


    public function it_exposes_pushed_at(RepoPushedAt $pushedAt)
    {
        $this->getPushedAt()->shouldReturn($pushedAt);
    }


    public function it_can_be_serialized(RepoCreatedAt $createdAt, RepoUpdatedAt $updatedAt, RepoPushedAt $pushedAt)
    {
        $createdAt->serialize()->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $updatedAt->serialize()->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $pushedAt->serialize()->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $this->serialize()->shouldReturn(['createdAt' => '2018-01-01T00:01:00+00:00', 'updatedAt' => '2018-01-01T00:01:00+00:00', 'pushedAt' => '2018-01-01T00:01:00+00:00']);
    }


    public function it_can_be_deserialized(RepoCreatedAt $createdAt, RepoUpdatedAt $updatedAt, RepoPushedAt $pushedAt)
    {
        $this->deserialize(['createdAt' => '2018-01-01T00:01:00+00:00', 'updatedAt' => '2018-01-01T00:01:00+00:00', 'pushedAt' => '2018-01-01T00:01:00+00:00'])->shouldReturnAnInstanceOf(RepoTimestamps::class);
    }
}
