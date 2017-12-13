<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\GitHubRepo;
use DevboardLib\GitHub\Repo\RepoCreatedAt;
use DevboardLib\GitHub\Repo\RepoDescription;
use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoApiUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoGitUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoHtmlUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoSshUrl;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoHomepage;
use DevboardLib\GitHub\Repo\RepoId;
use DevboardLib\GitHub\Repo\RepoLanguage;
use DevboardLib\GitHub\Repo\RepoMirrorUrl;
use DevboardLib\GitHub\Repo\RepoOwner;
use DevboardLib\GitHub\Repo\RepoPushedAt;
use DevboardLib\GitHub\Repo\RepoStats;
use DevboardLib\GitHub\Repo\RepoStats\RepoSize;
use DevboardLib\GitHub\Repo\RepoTimestamps;
use DevboardLib\GitHub\Repo\RepoUpdatedAt;
use DevboardLib\Git\Branch\BranchName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\GitHubRepo
 * @group  todo
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GitHubRepoTest extends TestCase
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

    /** @var RepoDescription */
    private $description;

    /** @var RepoHomepage */
    private $homepage;

    /** @var RepoLanguage */
    private $language;

    /** @var RepoMirrorUrl */
    private $mirrorUrl;

    /** @var bool */
    private $archived;

    /** @var RepoEndpoints */
    private $repoEndpoints;

    /** @var RepoStats */
    private $repoStats;

    /** @var RepoTimestamps */
    private $repoTimestamps;

    /** @var GitHubRepo */
    private $sut;


    public function setUp()
    {
        $this->id = new RepoId(1);
        $this->fullName = new RepoFullName('fullName');
        $this->owner = new RepoOwner(new AccountId(1), new AccountLogin('value'), new AccountType('type'), new AccountAvatarUrl('avatarUrl'), new GravatarId('value'), new AccountHtmlUrl('htmlUrl'), new AccountApiUrl('url'), true);
        $this->private = true;
        $this->defaultBranch = new BranchName('name');
        $this->fork = true;
        $this->description = new RepoDescription('description');
        $this->homepage = new RepoHomepage('homepage');
        $this->language = new RepoLanguage('language');
        $this->mirrorUrl = new RepoMirrorUrl('mirrorUrl');
        $this->archived = true;
        $this->repoEndpoints = new RepoEndpoints(new RepoHtmlUrl('htmlUrl'), new RepoApiUrl('url'), new RepoGitUrl('gitUrl'), new RepoSshUrl('sshUrl'));
        $this->repoStats = new RepoStats(1, 1, 1, 1, 1, new RepoSize(1));
        $this->repoTimestamps = new RepoTimestamps(new RepoCreatedAt('2018-01-01 00:01:00'), new RepoUpdatedAt('2018-01-01 00:01:00'), new RepoPushedAt('2018-01-01 00:01:00'));
        $this->sut = new GitHubRepo($this->id, $this->fullName, $this->owner, $this->private, $this->defaultBranch, $this->fork, $this->description, $this->homepage, $this->language, $this->mirrorUrl, $this->archived, $this->repoEndpoints, $this->repoStats, $this->repoTimestamps);
    }


    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }


    public function testGetFullName()
    {
        self::assertSame($this->fullName, $this->sut->getFullName());
    }


    public function testGetOwner()
    {
        self::assertSame($this->owner, $this->sut->getOwner());
    }


    public function testGetPrivate()
    {
        self::assertSame($this->private, $this->sut->getPrivate());
    }


    public function testGetDefaultBranch()
    {
        self::assertSame($this->defaultBranch, $this->sut->getDefaultBranch());
    }


    public function testGetFork()
    {
        self::assertSame($this->fork, $this->sut->getFork());
    }


    public function testGetDescription()
    {
        self::assertSame($this->description, $this->sut->getDescription());
    }


    public function testGetHomepage()
    {
        self::assertSame($this->homepage, $this->sut->getHomepage());
    }


    public function testGetLanguage()
    {
        self::assertSame($this->language, $this->sut->getLanguage());
    }


    public function testGetMirrorUrl()
    {
        self::assertSame($this->mirrorUrl, $this->sut->getMirrorUrl());
    }


    public function testGetArchived()
    {
        self::assertSame($this->archived, $this->sut->getArchived());
    }


    public function testGetRepoEndpoints()
    {
        self::assertSame($this->repoEndpoints, $this->sut->getRepoEndpoints());
    }


    public function testGetRepoStats()
    {
        self::assertSame($this->repoStats, $this->sut->getRepoStats());
    }


    public function testGetRepoTimestamps()
    {
        self::assertSame($this->repoTimestamps, $this->sut->getRepoTimestamps());
    }


    public function testSerializeAndDeserialize()
    {
        $serialized = $this->sut->serialize();
        self::assertEquals($this->sut, GitHubRepo::deserialize($serialized));
    }
}
