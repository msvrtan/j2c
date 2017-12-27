<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\Branch\BranchName;
use DevboardLib\GitHub\Branch\BranchProtectionUrl;
use DevboardLib\GitHub\GitHubBranch;
use DevboardLib\GitHub\GitHubCommit;
use PhpSpec\ObjectBehavior;

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


    public function it_exposes_protection_url(BranchProtectionUrl $protectionUrl)
    {
        $this->getProtectionUrl()->shouldReturn($protectionUrl);
    }


    public function it_can_be_serialized(BranchName $name, GitHubCommit $commit, BranchProtectionUrl $protectionUrl)
    {
        $name->serialize()->shouldBeCalled()->willReturn('name');
        $commit->serialize()->shouldBeCalled()->willReturn(['sha'=>'sha', 'message'=>'message', 'commitDate'=>'2018-01-01T00:01:00+00:00', 'author'=>['name'=>'name', 'email'=>'email', 'date'=>'2018-01-01T00:01:00+00:00', 'authorDetails'=>['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]], 'committer'=>['name'=>'name', 'email'=>'email', 'date'=>'2018-01-01T00:01:00+00:00', 'committerDetails'=>['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]], 'tree'=>['sha'=>'sha', 'url'=>'url'], 'parents'=>[['sha'=>'sha', 'apiUrl'=>'apiUrl', 'htmlUrl'=>'htmlUrl']], 'verification'=>['verified'=>true, 'reason'=>'reason', 'signature'=>'signature', 'payload'=>'payload'], 'apiUrl'=>'apiUrl', 'htmlUrl'=>'htmlUrl']);
        $protectionUrl->serialize()->shouldBeCalled()->willReturn('protectionUrl');
        $this->serialize()->shouldReturn(['name' => 'name', 'commit' => ['sha'=>'sha', 'message'=>'message', 'commitDate'=>'2018-01-01T00:01:00+00:00', 'author'=>['name'=>'name', 'email'=>'email', 'date'=>'2018-01-01T00:01:00+00:00', 'authorDetails'=>['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]], 'committer'=>['name'=>'name', 'email'=>'email', 'date'=>'2018-01-01T00:01:00+00:00', 'committerDetails'=>['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]], 'tree'=>['sha'=>'sha', 'url'=>'url'], 'parents'=>[['sha'=>'sha', 'apiUrl'=>'apiUrl', 'htmlUrl'=>'htmlUrl']], 'verification'=>['verified'=>true, 'reason'=>'reason', 'signature'=>'signature', 'payload'=>'payload'], 'apiUrl'=>'apiUrl', 'htmlUrl'=>'htmlUrl'], 'protected' => true, 'protectionUrl' => 'protectionUrl']);
    }


    public function it_can_be_deserialized(BranchName $name, GitHubCommit $commit, BranchProtectionUrl $protectionUrl)
    {
        $this->deserialize(['name' => 'name', 'commit' => ['sha'=>'sha', 'message'=>'message', 'commitDate'=>'2018-01-01T00:01:00+00:00', 'author'=>['name'=>'name', 'email'=>'email', 'date'=>'2018-01-01T00:01:00+00:00', 'authorDetails'=>['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]], 'committer'=>['name'=>'name', 'email'=>'email', 'date'=>'2018-01-01T00:01:00+00:00', 'committerDetails'=>['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]], 'tree'=>['sha'=>'sha', 'url'=>'url'], 'parents'=>[['sha'=>'sha', 'apiUrl'=>'apiUrl', 'htmlUrl'=>'htmlUrl']], 'verification'=>['verified'=>true, 'reason'=>'reason', 'signature'=>'signature', 'payload'=>'payload'], 'apiUrl'=>'apiUrl', 'htmlUrl'=>'htmlUrl'], 'protected' => true, 'protectionUrl' => 'protectionUrl'])->shouldReturnAnInstanceOf(GitHubBranch::class);
    }
}
