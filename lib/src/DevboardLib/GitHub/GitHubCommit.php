<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

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

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class GitHubCommit
{
    /** @var CommitSha */
    private $sha;

    /** @var CommitMessage */
    private $message;

    /** @var CommitDate */
    private $commitDate;

    /** @var CommitAuthor */
    private $author;

    /** @var CommitCommitter */
    private $committer;

    /** @var CommitTree */
    private $tree;

    /** @var CommitParentCollection */
    private $parents;

    /** @var CommitVerification */
    private $verification;

    /** @var CommitApiUrl */
    private $apiUrl;

    /** @var CommitHtmlUrl */
    private $htmlUrl;


    public function __construct(CommitSha $sha, CommitMessage $message, CommitDate $commitDate, CommitAuthor $author, CommitCommitter $committer, CommitTree $tree, CommitParentCollection $parents, CommitVerification $verification, CommitApiUrl $apiUrl, CommitHtmlUrl $htmlUrl)
    {
        $this->sha = $sha;
        $this->message = $message;
        $this->commitDate = $commitDate;
        $this->author = $author;
        $this->committer = $committer;
        $this->tree = $tree;
        $this->parents = $parents;
        $this->verification = $verification;
        $this->apiUrl = $apiUrl;
        $this->htmlUrl = $htmlUrl;
    }


    public function getSha(): CommitSha
    {
        return $this->sha;
    }


    public function getMessage(): CommitMessage
    {
        return $this->message;
    }


    public function getCommitDate(): CommitDate
    {
        return $this->commitDate;
    }


    public function getAuthor(): CommitAuthor
    {
        return $this->author;
    }


    public function getCommitter(): CommitCommitter
    {
        return $this->committer;
    }


    public function getTree(): CommitTree
    {
        return $this->tree;
    }


    public function getParents(): CommitParentCollection
    {
        return $this->parents;
    }


    public function getVerification(): CommitVerification
    {
        return $this->verification;
    }


    public function getApiUrl(): CommitApiUrl
    {
        return $this->apiUrl;
    }


    public function getHtmlUrl(): CommitHtmlUrl
    {
        return $this->htmlUrl;
    }


    public function serialize(): array
    {
        return [
            'sha' => $this->sha->serialize(),
            'message' => $this->message->serialize(),
            'commitDate' => $this->commitDate->serialize(),
            'author' => $this->author->serialize(),
            'committer' => $this->committer->serialize(),
            'tree' => $this->tree->serialize(),
            'parents' => $this->parents->serialize(),
            'verification' => $this->verification->serialize(),
            'apiUrl' => $this->apiUrl->serialize(),
            'htmlUrl' => $this->htmlUrl->serialize()
        ];
    }


    public static function deserialize(array $data): self
    {
        return new self(
            CommitSha::deserialize($data['sha']),
            CommitMessage::deserialize($data['message']),
            CommitDate::deserialize($data['commitDate']),
            CommitAuthor::deserialize($data['author']),
            CommitCommitter::deserialize($data['committer']),
            CommitTree::deserialize($data['tree']),
            CommitParentCollection::deserialize($data['parents']),
            CommitVerification::deserialize($data['verification']),
            CommitApiUrl::deserialize($data['apiUrl']),
            CommitHtmlUrl::deserialize($data['htmlUrl'])
        );
    }
}
