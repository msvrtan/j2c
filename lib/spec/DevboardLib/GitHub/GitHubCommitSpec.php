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
    public function let(\CommitSha $sha, \CommitMessage $message, \CommitDate $commitDate, \CommitAuthor $author, \CommitCommitter $committer, \CommitTree $tree, \CommitParentCollection $parents, \CommitVerification $verification, \CommitApiUrl $apiUrl, \CommitHtmlUrl $htmlUrl)
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


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('htmlUrl');
    }


    public function it_can_be_serialized(CommitSha $sha, CommitMessage $message, CommitDate $commitDate, CommitAuthor $author, CommitCommitter $committer, CommitTree $tree, CommitParentCollection $parents, CommitVerification $verification, CommitApiUrl $apiUrl, CommitHtmlUrl $htmlUrl)
    {
        $this->serialize()->shouldReturn(['sha' => 'sha', 'message' => 'message', 'commitDate' => '2018-01-01 00:01:00', 'author' => ['name'=>'author', 'email'=>'author', 'date'=>'2018-01-01 00:01:00', 'authorDetails'=>['id'=>1, 'login'=>'author', 'type'=>'author', 'avatarUrl'=>'author', 'gravatarId'=>'author', 'htmlUrl'=>'author', 'apiUrl'=>'author', 'siteAdmin'=>true]], 'committer' => ['name'=>'committer', 'email'=>'committer', 'date'=>'2018-01-01 00:01:00', 'committerDetails'=>['id'=>1, 'login'=>'committer', 'type'=>'committer', 'avatarUrl'=>'committer', 'gravatarId'=>'committer', 'htmlUrl'=>'committer', 'apiUrl'=>'committer', 'siteAdmin'=>true]], 'tree' => ['sha'=>'tree', 'url'=>'tree'], 'parents' => [['sha'=>'elements', 'apiUrl'=>'elements', 'htmlUrl'=>'elements']], 'verification' => ['verified'=>true, 'reason'=>'verification', 'signature'=>'verification', 'payload'=>'verification'], 'apiUrl' => 'apiUrl', 'htmlUrl' => 'htmlUrl']);
    }


    public function it_can_be_deserialized(CommitSha $sha, CommitMessage $message, CommitDate $commitDate, CommitAuthor $author, CommitCommitter $committer, CommitTree $tree, CommitParentCollection $parents, CommitVerification $verification, CommitApiUrl $apiUrl, CommitHtmlUrl $htmlUrl)
    {
        $this->deserialize(['sha' => 'sha', 'message' => 'message', 'commitDate' => '2018-01-01 00:01:00', 'author' => ['name'=>'author', 'email'=>'author', 'date'=>'2018-01-01 00:01:00', 'authorDetails'=>['id'=>1, 'login'=>'author', 'type'=>'author', 'avatarUrl'=>'author', 'gravatarId'=>'author', 'htmlUrl'=>'author', 'apiUrl'=>'author', 'siteAdmin'=>true]], 'committer' => ['name'=>'committer', 'email'=>'committer', 'date'=>'2018-01-01 00:01:00', 'committerDetails'=>['id'=>1, 'login'=>'committer', 'type'=>'committer', 'avatarUrl'=>'committer', 'gravatarId'=>'committer', 'htmlUrl'=>'committer', 'apiUrl'=>'committer', 'siteAdmin'=>true]], 'tree' => ['sha'=>'tree', 'url'=>'tree'], 'parents' => [['sha'=>'elements', 'apiUrl'=>'elements', 'htmlUrl'=>'elements']], 'verification' => ['verified'=>true, 'reason'=>'verification', 'signature'=>'verification', 'payload'=>'verification'], 'apiUrl' => 'apiUrl', 'htmlUrl' => 'htmlUrl'])->shouldReturnAnInstanceOf(GitHubCommit::class);
    }
}
