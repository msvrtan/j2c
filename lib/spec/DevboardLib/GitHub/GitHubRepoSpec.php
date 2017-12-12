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
use Prophecy\Argument;

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


    public function it_exposes_id(RepoId $id)
    {
        $this->getId()->shouldReturn($id);
    }


    public function it_exposes_fullName(RepoFullName $fullName)
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


    public function it_exposes_defaultBranch(BranchName $defaultBranch)
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


    public function it_exposes_mirrorUrl(RepoMirrorUrl $mirrorUrl)
    {
        $this->getMirrorUrl()->shouldReturn($mirrorUrl);
    }


    public function it_exposes_archived()
    {
        $this->getArchived()->shouldReturn(true);
    }


    public function it_exposes_repoEndpoints(RepoEndpoints $repoEndpoints)
    {
        $this->getRepoEndpoints()->shouldReturn($repoEndpoints);
    }


    public function it_exposes_repoStats(RepoStats $repoStats)
    {
        $this->getRepoStats()->shouldReturn($repoStats);
    }


    public function it_exposes_repoTimestamps(RepoTimestamps $repoTimestamps)
    {
        $this->getRepoTimestamps()->shouldReturn($repoTimestamps);
    }


    public function it_is_serializable(RepoId $id, RepoFullName $fullName, RepoOwner $owner, BranchName $defaultBranch, RepoDescription $description, RepoHomepage $homepage, RepoLanguage $language, RepoMirrorUrl $mirrorUrl, RepoEndpoints $repoEndpoints, RepoStats $repoStats, RepoTimestamps $repoTimestamps)
    {
        $id->serialize()->shouldBeCalled()->willReturn(1);
        $fullName->serialize()->shouldBeCalled()->willReturn('fullName');
        $owner->serialize()->shouldBeCalled()->willReturn([1, 'owner', 'owner', 'owner', 'owner', 'owner', 'owner', true]);
        $defaultBranch->serialize()->shouldBeCalled()->willReturn('defaultBranch');
        $description->serialize()->shouldBeCalled()->willReturn('description');
        $homepage->serialize()->shouldBeCalled()->willReturn('homepage');
        $language->serialize()->shouldBeCalled()->willReturn('language');
        $mirrorUrl->serialize()->shouldBeCalled()->willReturn('mirrorUrl');
        $repoEndpoints->serialize()->shouldBeCalled()->willReturn(['repoEndpoints', 'repoEndpoints', 'repoEndpoints', 'repoEndpoints']);
        $repoStats->serialize()->shouldBeCalled()->willReturn([1, 1, 1, 1, 1, 1]);
        $repoTimestamps->serialize()->shouldBeCalled()->willReturn(['2018-01-01 00:01:00', '2018-01-01 00:01:00', '2018-01-01 00:01:00']);
        $this->serialize()->shouldReturn(['id' => 1, 'fullName' => 'fullName', 'owner' => [1, 'owner', 'owner', 'owner', 'owner', 'owner', 'owner', true], 'private' => true, 'defaultBranch' => 'defaultBranch', 'fork' => true, 'description' => 'description', 'homepage' => 'homepage', 'language' => 'language', 'mirrorUrl' => 'mirrorUrl', 'archived' => true, 'repoEndpoints' => ['repoEndpoints', 'repoEndpoints', 'repoEndpoints', 'repoEndpoints'], 'repoStats' => [1, 1, 1, 1, 1, 1], 'repoTimestamps' => ['2018-01-01 00:01:00', '2018-01-01 00:01:00', '2018-01-01 00:01:00']]);
    }


    public function it_is_deserializable()
    {
        $this->deserialize(['id' => 1, 'fullName' => 'fullName', 'owner' => [1, 'owner', 'owner', 'owner', 'owner', 'owner', 'owner', true], 'private' => true, 'defaultBranch' => 'defaultBranch', 'fork' => true, 'description' => 'description', 'homepage' => 'homepage', 'language' => 'language', 'mirrorUrl' => 'mirrorUrl', 'archived' => true, 'repoEndpoints' => ['repoEndpoints', 'repoEndpoints', 'repoEndpoints', 'repoEndpoints'], 'repoStats' => [1, 1, 1, 1, 1, 1], 'repoTimestamps' => ['2018-01-01 00:01:00', '2018-01-01 00:01:00', '2018-01-01 00:01:00']])->shouldReturnAnInstanceOf(GitHubRepo::class);
    }
}
