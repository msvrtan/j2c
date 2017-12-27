<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\GitHub\Branch\BranchName;
use DevboardLib\GitHub\Repo\RepoDescription;
use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoHomepage;
use DevboardLib\GitHub\Repo\RepoId;
use DevboardLib\GitHub\Repo\RepoLanguage;
use DevboardLib\GitHub\Repo\RepoMirrorUrl;
use DevboardLib\GitHub\Repo\RepoOwner;
use DevboardLib\GitHub\Repo\RepoStats;
use DevboardLib\GitHub\Repo\RepoTimestamps;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class GitHubRepo
{
    /** @var RepoId */
    private $id;

    /** @var RepoFullName */
    private $fullName;

    /** @var RepoOwner */
    private $owner;

    /** @var bool */
    private $private;

    /** @var BranchName */
    private $defaultBranch;

    /** @var bool */
    private $fork;

    /** @var RepoDescription|null */
    private $description;

    /** @var RepoHomepage */
    private $homepage;

    /** @var RepoLanguage */
    private $language;

    /** @var RepoMirrorUrl|null */
    private $mirrorUrl;

    /** @var bool */
    private $archived;

    /** @var RepoEndpoints */
    private $repoEndpoints;

    /** @var RepoStats */
    private $repoStats;

    /** @var RepoTimestamps */
    private $repoTimestamps;


    public function __construct(RepoId $id, RepoFullName $fullName, RepoOwner $owner, bool $private, BranchName $defaultBranch, bool $fork, ?RepoDescription $description, RepoHomepage $homepage, RepoLanguage $language, ?RepoMirrorUrl $mirrorUrl, bool $archived, RepoEndpoints $repoEndpoints, RepoStats $repoStats, RepoTimestamps $repoTimestamps)
    {
        $this->id = $id;
        $this->fullName = $fullName;
        $this->owner = $owner;
        $this->private = $private;
        $this->defaultBranch = $defaultBranch;
        $this->fork = $fork;
        $this->description = $description;
        $this->homepage = $homepage;
        $this->language = $language;
        $this->mirrorUrl = $mirrorUrl;
        $this->archived = $archived;
        $this->repoEndpoints = $repoEndpoints;
        $this->repoStats = $repoStats;
        $this->repoTimestamps = $repoTimestamps;
    }


    public function getId(): RepoId
    {
        return $this->id;
    }


    public function getFullName(): RepoFullName
    {
        return $this->fullName;
    }


    public function getOwner(): RepoOwner
    {
        return $this->owner;
    }


    public function getPrivate(): bool
    {
        return $this->private;
    }


    public function getDefaultBranch(): BranchName
    {
        return $this->defaultBranch;
    }


    public function getFork(): bool
    {
        return $this->fork;
    }


    public function getDescription(): ?RepoDescription
    {
        return $this->description;
    }


    public function getHomepage(): RepoHomepage
    {
        return $this->homepage;
    }


    public function getLanguage(): RepoLanguage
    {
        return $this->language;
    }


    public function getMirrorUrl(): ?RepoMirrorUrl
    {
        return $this->mirrorUrl;
    }


    public function getArchived(): bool
    {
        return $this->archived;
    }


    public function getRepoEndpoints(): RepoEndpoints
    {
        return $this->repoEndpoints;
    }


    public function getRepoStats(): RepoStats
    {
        return $this->repoStats;
    }


    public function getRepoTimestamps(): RepoTimestamps
    {
        return $this->repoTimestamps;
    }


    public function serialize(): array
    {
        if(null === $this->description){
            $description = null;
        }else{
            $description = $this->description->serialize();
        }

        if(null === $this->mirrorUrl){
            $mirrorUrl = null;
        }else{
            $mirrorUrl = $this->mirrorUrl->serialize();
        }

        return [
            'id' => $this->id->serialize(),
            'fullName' => $this->fullName->serialize(),
            'owner' => $this->owner->serialize(),
            'private' => $this->private,
            'defaultBranch' => $this->defaultBranch->serialize(),
            'fork' => $this->fork,
            'description' => $description,
            'homepage' => $this->homepage->serialize(),
            'language' => $this->language->serialize(),
            'mirrorUrl' => $mirrorUrl,
            'archived' => $this->archived,
            'repoEndpoints' => $this->repoEndpoints->serialize(),
            'repoStats' => $this->repoStats->serialize(),
            'repoTimestamps' => $this->repoTimestamps->serialize()
        ];
    }


    public static function deserialize(array $data): self
    {
        if(null === $data['description']){
            $description = null;
        }else{
            $description = RepoDescription::deserialize($data['description']);
        }

        if(null === $data['mirrorUrl']){
            $mirrorUrl = null;
        }else{
            $mirrorUrl = RepoMirrorUrl::deserialize($data['mirrorUrl']);
        }

        return new self(
            RepoId::deserialize($data['id']),
            RepoFullName::deserialize($data['fullName']),
            RepoOwner::deserialize($data['owner']),
            $data['private'],
            BranchName::deserialize($data['defaultBranch']),
            $data['fork'],
            $description,
            RepoHomepage::deserialize($data['homepage']),
            RepoLanguage::deserialize($data['language']),
            $mirrorUrl,
            $data['archived'],
            RepoEndpoints::deserialize($data['repoEndpoints']),
            RepoStats::deserialize($data['repoStats']),
            RepoTimestamps::deserialize($data['repoTimestamps'])
        );
    }
}
