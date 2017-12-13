<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\Commit\CommitApiUrl;
use DevboardLib\GitHub\Commit\CommitAuthor;
use DevboardLib\GitHub\Commit\CommitCommitter;
use DevboardLib\GitHub\Commit\CommitHtmlUrl;
use DevboardLib\GitHub\Commit\CommitSha;
use DevboardLib\GitHub\Commit\CommitTree;
use DevboardLib\GitHub\Commit\CommitVerification;
use DevboardLib\GitHub\GitHubCommit;
use DevboardLib\Git\Commit\CommitDate;
use DevboardLib\Git\Commit\CommitMessage;
use DevboardLib\GitHub\Commit\CommitParentCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

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


    public function it_exposes_message(CommitMessage $message)
    {
        $this->getMessage()->shouldReturn($message);
    }


    public function it_exposes_commitDate(CommitDate $commitDate)
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


    public function it_exposes_apiUrl(CommitApiUrl $apiUrl)
    {
        $this->getApiUrl()->shouldReturn($apiUrl);
    }


    public function it_exposes_htmlUrl(CommitHtmlUrl $htmlUrl)
    {
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
    }


    public function it_is_serializable(CommitSha $sha, CommitMessage $message, CommitDate $commitDate, CommitAuthor $author, CommitCommitter $committer, CommitTree $tree, CommitParentCollection $parents, CommitVerification $verification, CommitApiUrl $apiUrl, CommitHtmlUrl $htmlUrl)
    {
        $sha->serialize()->shouldBeCalled()->willReturn('sha');
        $message->serialize()->shouldBeCalled()->willReturn('message');
        $commitDate->serialize()->shouldBeCalled()->willReturn('2018-01-01 00:01:00');
        $author->serialize()->shouldBeCalled()->willReturn(['author', 'author', '2018-01-01 00:01:00', [1, 'author', 'author', 'author', 'author', 'author', 'author', true]]);
        $committer->serialize()->shouldBeCalled()->willReturn(['committer', 'committer', '2018-01-01 00:01:00', [1, 'committer', 'committer', 'committer', 'committer', 'committer', 'committer', true]]);
        $tree->serialize()->shouldBeCalled()->willReturn(['tree', 'tree']);
        $parents->serialize()->shouldBeCalled()->willReturn(['data']);
        $verification->serialize()->shouldBeCalled()->willReturn([true, 'verification', 'verification', 'verification']);
        $apiUrl->serialize()->shouldBeCalled()->willReturn('apiUrl');
        $htmlUrl->serialize()->shouldBeCalled()->willReturn('htmlUrl');
        $this->serialize()->shouldReturn(['sha' => 'sha', 'message' => 'message', 'commitDate' => '2018-01-01 00:01:00', 'author' => ['author', 'author', '2018-01-01 00:01:00', [1, 'author', 'author', 'author', 'author', 'author', 'author', true]], 'committer' => ['committer', 'committer', '2018-01-01 00:01:00', [1, 'committer', 'committer', 'committer', 'committer', 'committer', 'committer', true]], 'tree' => ['tree', 'tree'], 'parents' => ['data'], 'verification' => [true, 'verification', 'verification', 'verification'], 'apiUrl' => 'apiUrl', 'htmlUrl' => 'htmlUrl']);
    }


    public function it_is_deserializable()
    {
        $this->deserialize(['sha' => 'sha', 'message' => 'message', 'commitDate' => '2018-01-01 00:01:00', 'author' => ['author', 'author', '2018-01-01 00:01:00', [1, 'author', 'author', 'author', 'author', 'author', 'author', true]], 'committer' => ['committer', 'committer', '2018-01-01 00:01:00', [1, 'committer', 'committer', 'committer', 'committer', 'committer', 'committer', true]], 'tree' => ['tree', 'tree'], 'parents' => ['data'], 'verification' => [true, 'verification', 'verification', 'verification'], 'apiUrl' => 'apiUrl', 'htmlUrl' => 'htmlUrl'])->shouldReturnAnInstanceOf(GitHubCommit::class);
    }
}
