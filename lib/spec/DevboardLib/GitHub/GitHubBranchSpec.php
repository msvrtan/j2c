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


    public function it_exposes_id(BranchProtectionUrl $protectionUrl)
    {
        $this->getId()->shouldReturn($protectionUrl);
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


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('protectionUrl');
    }


    public function it_can_be_serialized(BranchName $name, GitHubCommit $commit, BranchProtectionUrl $protectionUrl)
    {
        $this->serialize()->shouldReturn(['name' => 'name', 'commit' => ['sha'=>'commit', 'message'=>'commit', 'commitDate'=>'2018-01-01 00:01:00', 'author'=>['name'=>'commit', 'email'=>'commit', 'date'=>'2018-01-01 00:01:00', 'authorDetails'=>['id'=>1, 'login'=>'commit', 'type'=>'commit', 'avatarUrl'=>'commit', 'gravatarId'=>'commit', 'htmlUrl'=>'commit', 'apiUrl'=>'commit', 'siteAdmin'=>true]], 'committer'=>['name'=>'commit', 'email'=>'commit', 'date'=>'2018-01-01 00:01:00', 'committerDetails'=>['id'=>1, 'login'=>'commit', 'type'=>'commit', 'avatarUrl'=>'commit', 'gravatarId'=>'commit', 'htmlUrl'=>'commit', 'apiUrl'=>'commit', 'siteAdmin'=>true]], 'tree'=>['sha'=>'commit', 'url'=>'commit'], 'parents'=>[['sha'=>'elements', 'apiUrl'=>'elements', 'htmlUrl'=>'elements']], 'verification'=>['verified'=>true, 'reason'=>'commit', 'signature'=>'commit', 'payload'=>'commit'], 'apiUrl'=>'commit', 'htmlUrl'=>'commit'], 'protected' => true, 'protectionUrl' => 'protectionUrl']);
    }


    public function it_can_be_deserialized(BranchName $name, GitHubCommit $commit, BranchProtectionUrl $protectionUrl)
    {
        $this->deserialize(['name' => 'name', 'commit' => ['sha'=>'commit', 'message'=>'commit', 'commitDate'=>'2018-01-01 00:01:00', 'author'=>['name'=>'commit', 'email'=>'commit', 'date'=>'2018-01-01 00:01:00', 'authorDetails'=>['id'=>1, 'login'=>'commit', 'type'=>'commit', 'avatarUrl'=>'commit', 'gravatarId'=>'commit', 'htmlUrl'=>'commit', 'apiUrl'=>'commit', 'siteAdmin'=>true]], 'committer'=>['name'=>'commit', 'email'=>'commit', 'date'=>'2018-01-01 00:01:00', 'committerDetails'=>['id'=>1, 'login'=>'commit', 'type'=>'commit', 'avatarUrl'=>'commit', 'gravatarId'=>'commit', 'htmlUrl'=>'commit', 'apiUrl'=>'commit', 'siteAdmin'=>true]], 'tree'=>['sha'=>'commit', 'url'=>'commit'], 'parents'=>[['sha'=>'elements', 'apiUrl'=>'elements', 'htmlUrl'=>'elements']], 'verification'=>['verified'=>true, 'reason'=>'commit', 'signature'=>'commit', 'payload'=>'commit'], 'apiUrl'=>'commit', 'htmlUrl'=>'commit'], 'protected' => true, 'protectionUrl' => 'protectionUrl'])->shouldReturnAnInstanceOf(GitHubBranch::class);
    }
}
