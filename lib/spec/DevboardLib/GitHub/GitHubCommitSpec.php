<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\Commit\CommitApiUrl;
use DevboardLib\GitHub\Commit\CommitAuthor;
use DevboardLib\GitHub\Commit\CommitCommitter;
use DevboardLib\GitHub\Commit\CommitDate;
use DevboardLib\GitHub\Commit\CommitHtmlUrl;
use DevboardLib\GitHub\Commit\CommitMessage;
use DevboardLib\GitHub\Commit\CommitParentCollection;
use DevboardLib\GitHub\Commit\CommitSha;
use DevboardLib\GitHub\Commit\CommitTree;
use DevboardLib\GitHub\Commit\CommitVerification;
use DevboardLib\GitHub\GitHubCommit;
use PhpSpec\ObjectBehavior;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class GitHubCommitSpec extends ObjectBehavior
{
    public function let(CommitSha $sha, CommitMessage $message, CommitDate $commitDate, CommitAuthor $author, CommitCommitter $committer, CommitTree $tree, CommitParentCollection $parents, CommitVerification $verification, CommitApiUrl $apiUrl, CommitHtmlUrl $htmlUrl)
    {
        $this->beConstructedWith($sha, $message, $commitDate, $author, $committer, $tree, $parents, $verification, $apiUrl, $htmlUrl);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubCommit::class);
    }


    public function it_exposes_sha(CommitSha $sha)
    {
        $this->getSha()->shouldReturn($sha);
    }


    public function it_exposes_id(CommitHtmlUrl $htmlUrl)
    {
        $this->getId()->shouldReturn($htmlUrl);
    }


    public function it_exposes_message(CommitMessage $message)
    {
        $this->getMessage()->shouldReturn($message);
    }


    public function it_exposes_commit_date(CommitDate $commitDate)
    {
        $this->getCommitDate()->shouldReturn($commitDate);
    }


    public function it_exposes_author(CommitAuthor $author)
    {
        $this->getAuthor()->shouldReturn($author);
    }


    public function it_exposes_committer(CommitCommitter $committer)
    {
        $this->getCommitter()->shouldReturn($committer);
    }


    public function it_exposes_tree(CommitTree $tree)
    {
        $this->getTree()->shouldReturn($tree);
    }


    public function it_exposes_parents(CommitParentCollection $parents)
    {
        $this->getParents()->shouldReturn($parents);
    }


    public function it_exposes_verification(CommitVerification $verification)
    {
        $this->getVerification()->shouldReturn($verification);
    }


    public function it_exposes_api_url(CommitApiUrl $apiUrl)
    {
        $this->getApiUrl()->shouldReturn($apiUrl);
    }


    public function it_exposes_html_url(CommitHtmlUrl $htmlUrl)
    {
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
    }


    public function it_can_be_serialized(CommitSha $sha, CommitMessage $message, CommitDate $commitDate, CommitAuthor $author, CommitCommitter $committer, CommitTree $tree, CommitParentCollection $parents, CommitVerification $verification, CommitApiUrl $apiUrl, CommitHtmlUrl $htmlUrl)
    {
        $sha->serialize()->shouldBeCalled()->willReturn('sha');
        $message->serialize()->shouldBeCalled()->willReturn('message');
        $commitDate->serialize()->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $author->serialize()->shouldBeCalled()->willReturn(['name'=>'name', 'email'=>'email', 'date'=>'2018-01-01T00:01:00+00:00', 'authorDetails'=>['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]]);
        $committer->serialize()->shouldBeCalled()->willReturn(['name'=>'name', 'email'=>'email', 'date'=>'2018-01-01T00:01:00+00:00', 'committerDetails'=>['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]]);
        $tree->serialize()->shouldBeCalled()->willReturn(['sha'=>'sha', 'url'=>'url']);
        $parents->serialize()->shouldBeCalled()->willReturn([['sha'=>'sha', 'apiUrl'=>'apiUrl', 'htmlUrl'=>'htmlUrl']]);
        $verification->serialize()->shouldBeCalled()->willReturn(['verified'=>true, 'reason'=>'reason', 'signature'=>'signature', 'payload'=>'payload']);
        $apiUrl->serialize()->shouldBeCalled()->willReturn('apiUrl');
        $htmlUrl->serialize()->shouldBeCalled()->willReturn('htmlUrl');
        $this->serialize()->shouldReturn(['sha' => 'sha', 'message' => 'message', 'commitDate' => '2018-01-01T00:01:00+00:00', 'author' => ['name'=>'name', 'email'=>'email', 'date'=>'2018-01-01T00:01:00+00:00', 'authorDetails'=>['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]], 'committer' => ['name'=>'name', 'email'=>'email', 'date'=>'2018-01-01T00:01:00+00:00', 'committerDetails'=>['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]], 'tree' => ['sha'=>'sha', 'url'=>'url'], 'parents' => [['sha'=>'sha', 'apiUrl'=>'apiUrl', 'htmlUrl'=>'htmlUrl']], 'verification' => ['verified'=>true, 'reason'=>'reason', 'signature'=>'signature', 'payload'=>'payload'], 'apiUrl' => 'apiUrl', 'htmlUrl' => 'htmlUrl']);
    }


    public function it_can_be_deserialized(CommitSha $sha, CommitMessage $message, CommitDate $commitDate, CommitAuthor $author, CommitCommitter $committer, CommitTree $tree, CommitParentCollection $parents, CommitVerification $verification, CommitApiUrl $apiUrl, CommitHtmlUrl $htmlUrl)
    {
        $this->deserialize(['sha' => 'sha', 'message' => 'message', 'commitDate' => '2018-01-01T00:01:00+00:00', 'author' => ['name'=>'name', 'email'=>'email', 'date'=>'2018-01-01T00:01:00+00:00', 'authorDetails'=>['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]], 'committer' => ['name'=>'name', 'email'=>'email', 'date'=>'2018-01-01T00:01:00+00:00', 'committerDetails'=>['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]], 'tree' => ['sha'=>'sha', 'url'=>'url'], 'parents' => [['sha'=>'sha', 'apiUrl'=>'apiUrl', 'htmlUrl'=>'htmlUrl']], 'verification' => ['verified'=>true, 'reason'=>'reason', 'signature'=>'signature', 'payload'=>'payload'], 'apiUrl' => 'apiUrl', 'htmlUrl' => 'htmlUrl'])->shouldReturnAnInstanceOf(GitHubCommit::class);
    }
}
