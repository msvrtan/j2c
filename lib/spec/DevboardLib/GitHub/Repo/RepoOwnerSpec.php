<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Repo\RepoOwner;
use PhpSpec\ObjectBehavior;

class RepoOwnerSpec extends ObjectBehavior
{
    public function let(AccountId $id, AccountLogin $login, AccountType $type, AccountAvatarUrl $avatarUrl, GravatarId $gravatarId, AccountHtmlUrl $htmlUrl, AccountApiUrl $url)
    {
        $this->beConstructedWith($id, $login, $type, $avatarUrl, $gravatarId, $htmlUrl, $url, $siteAdmin = true);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoOwner::class);
    }


    public function it_exposes_id()
    {
        $this->getId()->shouldReturn(true);
    }


    public function it_exposes_login(AccountLogin $login)
    {
        $this->getLogin()->shouldReturn($login);
    }


    public function it_exposes_type(AccountType $type)
    {
        $this->getType()->shouldReturn($type);
    }


    public function it_exposes_avatar_url(AccountAvatarUrl $avatarUrl)
    {
        $this->getAvatarUrl()->shouldReturn($avatarUrl);
    }


    public function it_exposes_gravatar_id(GravatarId $gravatarId)
    {
        $this->getGravatarId()->shouldReturn($gravatarId);
    }


    public function it_exposes_html_url(AccountHtmlUrl $htmlUrl)
    {
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
    }


    public function it_exposes_url(AccountApiUrl $url)
    {
        $this->getUrl()->shouldReturn($url);
    }


    public function it_exposes_site_admin()
    {
        $this->getSiteAdmin()->shouldReturn(true);
    }


    public function it_can_be_serialized(AccountId $id, AccountLogin $login, AccountType $type, AccountAvatarUrl $avatarUrl, GravatarId $gravatarId, AccountHtmlUrl $htmlUrl, AccountApiUrl $url)
    {
        $id->serialize()->shouldBeCalled()->willReturn(1);
        $login->serialize()->shouldBeCalled()->willReturn('login');
        $type->serialize()->shouldBeCalled()->willReturn('type');
        $avatarUrl->serialize()->shouldBeCalled()->willReturn('avatarUrl');
        $gravatarId->serialize()->shouldBeCalled()->willReturn('gravatarId');
        $htmlUrl->serialize()->shouldBeCalled()->willReturn('htmlUrl');
        $url->serialize()->shouldBeCalled()->willReturn('url');
        $this->serialize()->shouldReturn(['id' => 1, 'login' => 'login', 'type' => 'type', 'avatarUrl' => 'avatarUrl', 'gravatarId' => 'gravatarId', 'htmlUrl' => 'htmlUrl', 'url' => 'url', 'siteAdmin' => true]);
    }


    public function it_can_be_deserialized(AccountId $id, AccountLogin $login, AccountType $type, AccountAvatarUrl $avatarUrl, GravatarId $gravatarId, AccountHtmlUrl $htmlUrl, AccountApiUrl $url)
    {
        $this->deserialize(['id' => 1, 'login' => 'login', 'type' => 'type', 'avatarUrl' => 'avatarUrl', 'gravatarId' => 'gravatarId', 'htmlUrl' => 'htmlUrl', 'url' => 'url', 'siteAdmin' => true])->shouldReturnAnInstanceOf(RepoOwner::class);
    }
}
