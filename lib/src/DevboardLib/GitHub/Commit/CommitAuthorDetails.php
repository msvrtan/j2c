<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;

class CommitAuthorDetails
{
    /** @var UserId */
    private $id;

    /** @var UserLogin */
    private $login;

    /** @var AccountType */
    private $type;

    /** @var UserAvatarUrl */
    private $avatarUrl;

    /** @var GravatarId */
    private $gravatarId;

    /** @var UserHtmlUrl */
    private $htmlUrl;

    /** @var UserApiUrl */
    private $apiUrl;

    /** @var bool */
    private $siteAdmin;


    public function __construct(UserId $id, UserLogin $login, AccountType $type, UserAvatarUrl $avatarUrl, GravatarId $gravatarId, UserHtmlUrl $htmlUrl, UserApiUrl $apiUrl, bool $siteAdmin)
    {
        $this->id = $id;
        $this->login = $login;
        $this->type = $type;
        $this->avatarUrl = $avatarUrl;
        $this->gravatarId = $gravatarId;
        $this->htmlUrl = $htmlUrl;
        $this->apiUrl = $apiUrl;
        $this->siteAdmin = $siteAdmin;
    }


    public function getId(): UserId
    {
        return $this->id;
    }


    public function getLogin(): UserLogin
    {
        return $this->login;
    }


    public function getType(): AccountType
    {
        return $this->type;
    }


    public function getAvatarUrl(): UserAvatarUrl
    {
        return $this->avatarUrl;
    }


    public function getGravatarId(): GravatarId
    {
        return $this->gravatarId;
    }


    public function getHtmlUrl(): UserHtmlUrl
    {
        return $this->htmlUrl;
    }


    public function getApiUrl(): UserApiUrl
    {
        return $this->apiUrl;
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
            'apiUrl' => $this->apiUrl->serialize(),
            'siteAdmin' => $this->siteAdmin
        ];
    }


    public static function deserialize(array $data): self
    {
        return new self(
            UserId::deserialize($data['id']),
            UserLogin::deserialize($data['login']),
            AccountType::deserialize($data['type']),
            UserAvatarUrl::deserialize($data['avatarUrl']),
            GravatarId::deserialize($data['gravatarId']),
            UserHtmlUrl::deserialize($data['htmlUrl']),
            UserApiUrl::deserialize($data['apiUrl']),
            $data['siteAdmin']
        );
    }
}
