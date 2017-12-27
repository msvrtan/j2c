<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\Tree\TreeSha;
use DevboardLib\GitHub\Commit\Tree\TreeUrl;

class CommitTree
{
    /** @var TreeSha */
    private $sha;

    /** @var TreeUrl */
    private $url;


    public function __construct(TreeSha $sha, TreeUrl $url)
    {
        $this->sha = $sha;
        $this->url = $url;
    }


    public function getSha(): TreeSha
    {
        return $this->sha;
    }


    public function getId(): TreeUrl
    {
        return $this->url;
    }


    public function getUrl(): TreeUrl
    {
        return $this->url;
    }


    public function __toString(): string
    {
        return (string) $this->url;
    }


    public function serialize(): array
    {
        return [
            'sha' => $this->sha->serialize(),
            'url' => $this->url->serialize()
        ];
    }


    public static function deserialize(array $data): self
    {
        return new self(
            TreeSha::deserialize($data['sha']),
            TreeUrl::deserialize($data['url'])
        );
    }
}
