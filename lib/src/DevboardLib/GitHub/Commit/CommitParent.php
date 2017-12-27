<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitParent\ParentApiUrl;
use DevboardLib\GitHub\Commit\CommitParent\ParentHtmlUrl;

class CommitParent
{
    /** @var CommitSha */
    private $sha;

    /** @var ParentApiUrl */
    private $apiUrl;

    /** @var ParentHtmlUrl */
    private $htmlUrl;


    public function __construct(CommitSha $sha, ParentApiUrl $apiUrl, ParentHtmlUrl $htmlUrl)
    {
        $this->sha = $sha;
        $this->apiUrl = $apiUrl;
        $this->htmlUrl = $htmlUrl;
    }


    public function getSha(): CommitSha
    {
        return $this->sha;
    }


    public function getId(): ParentHtmlUrl
    {
        return $this->htmlUrl;
    }


    public function getApiUrl(): ParentApiUrl
    {
        return $this->apiUrl;
    }


    public function getHtmlUrl(): ParentHtmlUrl
    {
        return $this->htmlUrl;
    }


    public function __toString(): string
    {
        return (string) $this->htmlUrl;
    }


    public function serialize(): array
    {
        return [
            'sha' => $this->sha->serialize(),
            'apiUrl' => $this->apiUrl->serialize(),
            'htmlUrl' => $this->htmlUrl->serialize()
        ];
    }


    public static function deserialize(array $data): self
    {
        return new self(
            CommitSha::deserialize($data['sha']),
            ParentApiUrl::deserialize($data['apiUrl']),
            ParentHtmlUrl::deserialize($data['htmlUrl'])
        );
    }
}
