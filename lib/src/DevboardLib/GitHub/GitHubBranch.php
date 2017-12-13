<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\GitHub\Branch\BranchProtectionUrl;
use DevboardLib\Git\Branch\BranchName;

class GitHubBranch
{
    /** @var BranchName */
    private $name;

    /** @var GitHubCommit */
    private $commit;

    /** @var bool */
    private $protected;

    /** @var BranchProtectionUrl */
    private $protectionUrl;


    public function __construct(BranchName $name, GitHubCommit $commit, bool $protected, BranchProtectionUrl $protectionUrl)
    {
        $this->name = $name;
        $this->commit = $commit;
        $this->protected = $protected;
        $this->protectionUrl = $protectionUrl;
    }


    public function getName(): BranchName
    {
        return $this->name;
    }


    public function getCommit(): GitHubCommit
    {
        return $this->commit;
    }


    public function getProtected(): bool
    {
        return $this->protected;
    }


    public function getProtectionUrl(): BranchProtectionUrl
    {
        return $this->protectionUrl;
    }


    public function serialize(): array
    {
        return [
            'name' => $this->name->serialize(),
            'commit' => $this->commit->serialize(),
            'protected' => $this->protected,
            'protectionUrl' => $this->protectionUrl->serialize()
        ];
    }


    public static function deserialize(array $data): self
    {
        return new self(
            BranchName::deserialize($data['name']),
            GitHubCommit::deserialize($data['commit']),
            $data['protected'],
            BranchProtectionUrl::deserialize($data['protectionUrl'])
        );
    }
}
