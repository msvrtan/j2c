<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;

class RepoOwner
{
    /** @var AccountId */
    private $id;

    /** @var AccountLogin */
    private $login;

    /** @var AccountType */
    private $type;

    /** @var AccountAvatarUrl */
    private $avatarUrl;

    /** @var GravatarId */
    private $gravatarId;

    /** @var AccountHtmlUrl */
    private $htmlUrl;

    /** @var AccountApiUrl */
    private $url;

    /** @var bool */
    private $siteAdmin;


    public function __construct(AccountId $id, AccountLogin $login, AccountType $type, AccountAvatarUrl $avatarUrl, GravatarId $gravatarId, AccountHtmlUrl $htmlUrl, AccountApiUrl $url, bool $siteAdmin)
    {
        $this->id = $id;
        $this->login = $login;
        $this->type = $type;
        $this->avatarUrl = $avatarUrl;
        $this->gravatarId = $gravatarId;
        $this->htmlUrl = $htmlUrl;
        $this->url = $url;
        $this->siteAdmin = $siteAdmin;
    }


    public function getId(): AccountId
    {
        return $this->id;
    }


    public function getLogin(): AccountLogin
    {
        return $this->login;
    }


    public function getType(): AccountType
    {
        return $this->type;
    }


    public function getAvatarUrl(): AccountAvatarUrl
    {
        return $this->avatarUrl;
    }


    public function getGravatarId(): GravatarId
    {
        return $this->gravatarId;
    }


    public function getHtmlUrl(): AccountHtmlUrl
    {
        return $this->htmlUrl;
    }


    public function getUrl(): AccountApiUrl
    {
        return $this->url;
    }


    public function getSiteAdmin(): bool
    {
        return $this->siteAdmin;
    }


    public function serialize(): array
    {
        return [
            'id' => $this->id->serialize(),
            'login' => $this->login->serialize(),
            'type' => $this->type->serialize(),
            'avatarUrl' => $this->avatarUrl->serialize(),
            'gravatarId' => $this->gravatarId->serialize(),
            'htmlUrl' => $this->htmlUrl->serialize(),
            'url' => $this->url->serialize(),
            'siteAdmin' => $this->siteAdmin
        ];
    }


    public static function deserialize(array $data): self
    {
        return new self(
            AccountId::deserialize($data['id']),
            AccountLogin::deserialize($data['login']),
            AccountType::deserialize($data['type']),
            AccountAvatarUrl::deserialize($data['avatarUrl']),
            GravatarId::deserialize($data['gravatarId']),
            AccountHtmlUrl::deserialize($data['htmlUrl']),
            AccountApiUrl::deserialize($data['url']),
            $data['siteAdmin']
        );
    }
}
