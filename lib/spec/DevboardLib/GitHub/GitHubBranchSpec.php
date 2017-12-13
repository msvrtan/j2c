<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\Branch\BranchProtectionUrl;
use DevboardLib\GitHub\GitHubBranch;
use DevboardLib\GitHub\GitHubCommit;
use DevboardLib\Git\Branch\BranchName;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GitHubBranchSpec extends ObjectBehavior
{
    public function let(BranchName $name, GitHubCommit $commit, BranchProtectionUrl $protectionUrl)
    {
        $this->beConstructedWith($name, $commit, $protected = true, $protectionUrl);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubBranch::class);
    }


    public function it_exposes_name(BranchName $name)
    {
        $this->getName()->shouldReturn($name);
    }


    public function it_exposes_commit(GitHubCommit $commit)
    {
        $this->getCommit()->shouldReturn($commit);
    }


    public function it_exposes_protected()
    {
        $this->getProtected()->shouldReturn(true);
    }


    public function it_exposes_protectionUrl(BranchProtectionUrl $protectionUrl)
    {
        $this->getProtectionUrl()->shouldReturn($protectionUrl);
    }


    public function it_is_serializable(BranchName $name, GitHubCommit $commit, BranchProtectionUrl $protectionUrl)
    {
        $name->serialize()->shouldBeCalled()->willReturn('name');
        $commit->serialize()->shouldBeCalled()->willReturn(['commit', 'commit', '2018-01-01 00:01:00', ['commit', 'commit', '2018-01-01 00:01:00', [1, 'commit', 'commit', 'commit', 'commit', 'commit', 'commit', true]], ['commit', 'commit', '2018-01-01 00:01:00', [1, 'commit', 'commit', 'commit', 'commit', 'commit', 'commit', true]], ['commit', 'commit'], ['data'], [true, 'commit', 'commit', 'commit'], 'commit', 'commit']);
        $protectionUrl->serialize()->shouldBeCalled()->willReturn('protectionUrl');
        $this->serialize()->shouldReturn(['name' => 'name', 'commit' => ['commit', 'commit', '2018-01-01 00:01:00', ['commit', 'commit', '2018-01-01 00:01:00', [1, 'commit', 'commit', 'commit', 'commit', 'commit', 'commit', true]], ['commit', 'commit', '2018-01-01 00:01:00', [1, 'commit', 'commit', 'commit', 'commit', 'commit', 'commit', true]], ['commit', 'commit'], ['data'], [true, 'commit', 'commit', 'commit'], 'commit', 'commit'], 'protected' => true, 'protectionUrl' => 'protectionUrl']);
    }


    public function it_is_deserializable()
    {
        $this->deserialize(['name' => 'name', 'commit' => ['commit', 'commit', '2018-01-01 00:01:00', ['commit', 'commit', '2018-01-01 00:01:00', [1, 'commit', 'commit', 'commit', 'commit', 'commit', 'commit', true]], ['commit', 'commit', '2018-01-01 00:01:00', [1, 'commit', 'commit', 'commit', 'commit', 'commit', 'commit', true]], ['commit', 'commit'], ['data'], [true, 'commit', 'commit', 'commit'], 'commit', 'commit'], 'protected' => true, 'protectionUrl' => 'protectionUrl'])->shouldReturnAnInstanceOf(GitHubBranch::class);
    }
}
