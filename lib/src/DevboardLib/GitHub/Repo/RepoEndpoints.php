<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoEndpoints\RepoApiUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoGitUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoHtmlUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoSshUrl;

class RepoEndpoints
{
    /** @var RepoHtmlUrl */
    private $htmlUrl;

    /** @var RepoApiUrl */
    private $url;

    /** @var RepoGitUrl */
    private $gitUrl;

    /** @var RepoSshUrl */
    private $sshUrl;


    public function __construct(RepoHtmlUrl $htmlUrl, RepoApiUrl $url, RepoGitUrl $gitUrl, RepoSshUrl $sshUrl)
    {
        $this->htmlUrl = $htmlUrl;
        $this->url = $url;
        $this->gitUrl = $gitUrl;
        $this->sshUrl = $sshUrl;
    }


    public function getHtmlUrl(): RepoHtmlUrl
    {
        return $this->htmlUrl;
    }


    public function getId(): RepoSshUrl
    {
        return $this->sshUrl;
    }


    public function getUrl(): RepoApiUrl
    {
        return $this->url;
    }


    public function getGitUrl(): RepoGitUrl
    {
        return $this->gitUrl;
    }


    public function getSshUrl(): RepoSshUrl
    {
        return $this->sshUrl;
    }


    public function serialize(): array
    {
        return [
            'htmlUrl' => $this->htmlUrl->serialize(),
            'url' => $this->url->serialize(),
            'gitUrl' => $this->gitUrl->serialize(),
            'sshUrl' => $this->sshUrl->serialize()
        ];
    }


    public static function deserialize(array $data): self
    {
        return new self(
            RepoHtmlUrl::deserialize($data['htmlUrl']),
            RepoApiUrl::deserialize($data['url']),
            RepoGitUrl::deserialize($data['gitUrl']),
            RepoSshUrl::deserialize($data['sshUrl'])
        );
    }
}
