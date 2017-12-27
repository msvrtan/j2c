<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\Branch\BranchName;
use DevboardLib\GitHub\GitHubRepo;
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
use PhpSpec\ObjectBehavior;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class GitHubRepoSpec extends ObjectBehavior
{
    public function let(RepoId $id, RepoFullName $fullName, RepoOwner $owner, BranchName $defaultBranch, RepoDescription $description, RepoHomepage $homepage, RepoLanguage $language, RepoMirrorUrl $mirrorUrl, RepoEndpoints $repoEndpoints, RepoStats $repoStats, RepoTimestamps $repoTimestamps)
    {
        $this->beConstructedWith($id, $fullName, $owner, $private = true, $defaultBranch, $fork = true, $description, $homepage, $language, $mirrorUrl, $archived = true, $repoEndpoints, $repoStats, $repoTimestamps);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubRepo::class);
    }


    public function it_exposes_id(RepoTimestamps $repoTimestamps)
    {
        $this->getId()->shouldReturn($repoTimestamps);
    }


    public function it_exposes_full_name(RepoFullName $fullName)
    {
        $this->getFullName()->shouldReturn($fullName);
    }


    public function it_exposes_owner(RepoOwner $owner)
    {
        $this->getOwner()->shouldReturn($owner);
    }


    public function it_exposes_private()
    {
        $this->getPrivate()->shouldReturn(true);
    }


    public function it_exposes_default_branch(BranchName $defaultBranch)
    {
        $this->getDefaultBranch()->shouldReturn($defaultBranch);
    }


    public function it_exposes_fork()
    {
        $this->getFork()->shouldReturn(true);
    }


    public function it_exposes_description(RepoDescription $description)
    {
        $this->getDescription()->shouldReturn($description);
    }


    public function it_exposes_homepage(RepoHomepage $homepage)
    {
        $this->getHomepage()->shouldReturn($homepage);
    }


    public function it_exposes_language(RepoLanguage $language)
    {
        $this->getLanguage()->shouldReturn($language);
    }


    public function it_exposes_mirror_url(RepoMirrorUrl $mirrorUrl)
    {
        $this->getMirrorUrl()->shouldReturn($mirrorUrl);
    }


    public function it_exposes_archived()
    {
        $this->getArchived()->shouldReturn(true);
    }


    public function it_exposes_repo_endpoints(RepoEndpoints $repoEndpoints)
    {
        $this->getRepoEndpoints()->shouldReturn($repoEndpoints);
    }


    public function it_exposes_repo_stats(RepoStats $repoStats)
    {
        $this->getRepoStats()->shouldReturn($repoStats);
    }


    public function it_exposes_repo_timestamps(RepoTimestamps $repoTimestamps)
    {
        $this->getRepoTimestamps()->shouldReturn($repoTimestamps);
    }


    public function it_can_be_serialized(RepoId $id, RepoFullName $fullName, RepoOwner $owner, BranchName $defaultBranch, RepoDescription $description, RepoHomepage $homepage, RepoLanguage $language, RepoMirrorUrl $mirrorUrl, RepoEndpoints $repoEndpoints, RepoStats $repoStats, RepoTimestamps $repoTimestamps)
    {
        $id->serialize()->shouldBeCalled()->willReturn(1);
        $fullName->serialize()->shouldBeCalled()->willReturn('fullName');
        $owner->serialize()->shouldBeCalled()->willReturn(['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'url'=>'url', 'siteAdmin'=>true]);
        $defaultBranch->serialize()->shouldBeCalled()->willReturn('name');
        $description->serialize()->shouldBeCalled()->willReturn('description');
        $homepage->serialize()->shouldBeCalled()->willReturn('homepage');
        $language->serialize()->shouldBeCalled()->willReturn('language');
        $mirrorUrl->serialize()->shouldBeCalled()->willReturn('mirrorUrl');
        $repoEndpoints->serialize()->shouldBeCalled()->willReturn(['htmlUrl'=>'htmlUrl', 'url'=>'url', 'gitUrl'=>'gitUrl', 'sshUrl'=>'sshUrl']);
        $repoStats->serialize()->shouldBeCalled()->willReturn(['networkCount'=>1, 'watchersCount'=>1, 'stargazersCount'=>1, 'subscribersCount'=>1, 'openIssuesCount'=>1, 'size'=>1]);
        $repoTimestamps->serialize()->shouldBeCalled()->willReturn(['createdAt'=>'2018-01-01T00:01:00+00:00', 'updatedAt'=>'2018-01-01T00:01:00+00:00', 'pushedAt'=>'2018-01-01T00:01:00+00:00']);
        $this->serialize()->shouldReturn(['id' => 1, 'fullName' => 'fullName', 'owner' => ['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'url'=>'url', 'siteAdmin'=>true], 'private' => true, 'defaultBranch' => 'name', 'fork' => true, 'description' => 'description', 'homepage' => 'homepage', 'language' => 'language', 'mirrorUrl' => 'mirrorUrl', 'archived' => true, 'repoEndpoints' => ['htmlUrl'=>'htmlUrl', 'url'=>'url', 'gitUrl'=>'gitUrl', 'sshUrl'=>'sshUrl'], 'repoStats' => ['networkCount'=>1, 'watchersCount'=>1, 'stargazersCount'=>1, 'subscribersCount'=>1, 'openIssuesCount'=>1, 'size'=>1], 'repoTimestamps' => ['createdAt'=>'2018-01-01T00:01:00+00:00', 'updatedAt'=>'2018-01-01T00:01:00+00:00', 'pushedAt'=>'2018-01-01T00:01:00+00:00']]);
    }


    public function it_can_be_deserialized(RepoId $id, RepoFullName $fullName, RepoOwner $owner, BranchName $defaultBranch, RepoDescription $description, RepoHomepage $homepage, RepoLanguage $language, RepoMirrorUrl $mirrorUrl, RepoEndpoints $repoEndpoints, RepoStats $repoStats, RepoTimestamps $repoTimestamps)
    {
        $this->deserialize(['id' => 1, 'fullName' => 'fullName', 'owner' => ['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'url'=>'url', 'siteAdmin'=>true], 'private' => true, 'defaultBranch' => 'name', 'fork' => true, 'description' => 'description', 'homepage' => 'homepage', 'language' => 'language', 'mirrorUrl' => 'mirrorUrl', 'archived' => true, 'repoEndpoints' => ['htmlUrl'=>'htmlUrl', 'url'=>'url', 'gitUrl'=>'gitUrl', 'sshUrl'=>'sshUrl'], 'repoStats' => ['networkCount'=>1, 'watchersCount'=>1, 'stargazersCount'=>1, 'subscribersCount'=>1, 'openIssuesCount'=>1, 'size'=>1], 'repoTimestamps' => ['createdAt'=>'2018-01-01T00:01:00+00:00', 'updatedAt'=>'2018-01-01T00:01:00+00:00', 'pushedAt'=>'2018-01-01T00:01:00+00:00']])->shouldReturnAnInstanceOf(GitHubRepo::class);
    }
}
