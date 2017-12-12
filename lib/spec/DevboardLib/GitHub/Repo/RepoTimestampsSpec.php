<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoCreatedAt;
use DevboardLib\GitHub\Repo\RepoPushedAt;
use DevboardLib\GitHub\Repo\RepoTimestamps;
use DevboardLib\GitHub\Repo\RepoUpdatedAt;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

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


    public function it_exposes_createdAt(RepoCreatedAt $createdAt)
    {
        $this->getCreatedAt()->shouldReturn($createdAt);
    }


    public function it_exposes_updatedAt(RepoUpdatedAt $updatedAt)
    {
        $this->getUpdatedAt()->shouldReturn($updatedAt);
    }


    public function it_exposes_pushedAt(RepoPushedAt $pushedAt)
    {
        $this->getPushedAt()->shouldReturn($pushedAt);
    }


    public function it_is_serializable(RepoCreatedAt $createdAt, RepoUpdatedAt $updatedAt, RepoPushedAt $pushedAt)
    {
        $createdAt->serialize()->shouldBeCalled()->willReturn('2018-01-01 00:01:00');
        $updatedAt->serialize()->shouldBeCalled()->willReturn('2018-01-01 00:01:00');
        $pushedAt->serialize()->shouldBeCalled()->willReturn('2018-01-01 00:01:00');
        $this->serialize()->shouldReturn(['createdAt' => '2018-01-01 00:01:00', 'updatedAt' => '2018-01-01 00:01:00', 'pushedAt' => '2018-01-01 00:01:00']);
    }


    public function it_is_deserializable()
    {
        $this->deserialize(['createdAt' => '2018-01-01 00:01:00', 'updatedAt' => '2018-01-01 00:01:00', 'pushedAt' => '2018-01-01 00:01:00'])->shouldReturnAnInstanceOf(RepoTimestamps::class);
    }
}
