<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Commit\CommitAuthorDetails;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;
use PhpSpec\ObjectBehavior;

class CommitAuthorDetailsSpec extends ObjectBehavior
{
    public function let(UserId $id, UserLogin $login, AccountType $type, UserAvatarUrl $avatarUrl, GravatarId $gravatarId, UserHtmlUrl $htmlUrl, UserApiUrl $apiUrl)
    {
        $this->beConstructedWith($id, $login, $type, $avatarUrl, $gravatarId, $htmlUrl, $apiUrl, $siteAdmin = true);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitAuthorDetails::class);
    }


    public function it_exposes_id()
    {
        $this->getId()->shouldReturn(true);
    }


    public function it_exposes_login(UserLogin $login)
    {
        $this->getLogin()->shouldReturn($login);
    }


    public function it_exposes_type(AccountType $type)
    {
        $this->getType()->shouldReturn($type);
    }


    public function it_exposes_avatar_url(UserAvatarUrl $avatarUrl)
    {
        $this->getAvatarUrl()->shouldReturn($avatarUrl);
    }


    public function it_exposes_gravatar_id(GravatarId $gravatarId)
    {
        $this->getGravatarId()->shouldReturn($gravatarId);
    }


    public function it_exposes_html_url(UserHtmlUrl $htmlUrl)
    {
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
    }


    public function it_exposes_api_url(UserApiUrl $apiUrl)
    {
        $this->getApiUrl()->shouldReturn($apiUrl);
    }


    public function it_exposes_site_admin()
    {
        $this->getSiteAdmin()->shouldReturn(true);
    }


    public function it_can_be_serialized(UserId $id, UserLogin $login, AccountType $type, UserAvatarUrl $avatarUrl, GravatarId $gravatarId, UserHtmlUrl $htmlUrl, UserApiUrl $apiUrl)
    {
        $id->serialize()->shouldBeCalled()->willReturn(1);
        $login->serialize()->shouldBeCalled()->willReturn('login');
        $type->serialize()->shouldBeCalled()->willReturn('type');
        $avatarUrl->serialize()->shouldBeCalled()->willReturn('avatarUrl');
        $gravatarId->serialize()->shouldBeCalled()->willReturn('gravatarId');
        $htmlUrl->serialize()->shouldBeCalled()->willReturn('htmlUrl');
        $apiUrl->serialize()->shouldBeCalled()->willReturn('apiUrl');
        $this->serialize()->shouldReturn(['id' => 1, 'login' => 'login', 'type' => 'type', 'avatarUrl' => 'avatarUrl', 'gravatarId' => 'gravatarId', 'htmlUrl' => 'htmlUrl', 'apiUrl' => 'apiUrl', 'siteAdmin' => true]);
    }


    public function it_can_be_deserialized(UserId $id, UserLogin $login, AccountType $type, UserAvatarUrl $avatarUrl, GravatarId $gravatarId, UserHtmlUrl $htmlUrl, UserApiUrl $apiUrl)
    {
        $this->deserialize(['id' => 1, 'login' => 'login', 'type' => 'type', 'avatarUrl' => 'avatarUrl', 'gravatarId' => 'gravatarId', 'htmlUrl' => 'htmlUrl', 'apiUrl' => 'apiUrl', 'siteAdmin' => true])->shouldReturnAnInstanceOf(CommitAuthorDetails::class);
    }
}
