<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Branch\BranchName;
use DevboardLib\GitHub\Branch\BranchProtectionUrl;
use DevboardLib\GitHub\Commit\Author\AuthorName;
use DevboardLib\GitHub\Commit\CommitApiUrl;
use DevboardLib\GitHub\Commit\CommitAuthor;
use DevboardLib\GitHub\Commit\CommitAuthorDetails;
use DevboardLib\GitHub\Commit\CommitCommitter;
use DevboardLib\GitHub\Commit\CommitCommitterDetails;
use DevboardLib\GitHub\Commit\CommitDate;
use DevboardLib\GitHub\Commit\CommitHtmlUrl;
use DevboardLib\GitHub\Commit\CommitMessage;
use DevboardLib\GitHub\Commit\CommitParent;
use DevboardLib\GitHub\Commit\CommitParentCollection;
use DevboardLib\GitHub\Commit\CommitParent\ParentApiUrl;
use DevboardLib\GitHub\Commit\CommitParent\ParentHtmlUrl;
use DevboardLib\GitHub\Commit\CommitSha;
use DevboardLib\GitHub\Commit\CommitTree;
use DevboardLib\GitHub\Commit\CommitVerification;
use DevboardLib\GitHub\Commit\Committer\CommitterName;
use DevboardLib\GitHub\Commit\Tree\TreeSha;
use DevboardLib\GitHub\Commit\Tree\TreeUrl;
use DevboardLib\GitHub\Commit\Verification\VerificationPayload;
use DevboardLib\GitHub\Commit\Verification\VerificationReason;
use DevboardLib\GitHub\Commit\Verification\VerificationSignature;
use DevboardLib\GitHub\Commit\Verification\VerificationVerified;
use DevboardLib\GitHub\GitHubBranch;
use DevboardLib\GitHub\GitHubCommit;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class GitHubBranchTest extends TestCase
{
    /** @var BranchName */
    private $name;

    /** @var GitHubCommit */
    private $commit;

    /** @var bool */
    private $protected;

    /** @var BranchProtectionUrl */
    private $protectionUrl;

    /** @var GitHubBranch */
    private $sut;


    public function setUp()
    {
        $this->name = new BranchName('name');
        $this->commit = new GitHubCommit(new CommitSha('sha'), new CommitMessage('message'), new CommitDate('2018-01-01T00:01:00+00:00'), new CommitAuthor(new AuthorName('name'), new EmailAddress('email'), new CommitDate('2018-01-01T00:01:00+00:00'), new CommitAuthorDetails(new UserId(1), new UserLogin('login'), new AccountType('type'), new UserAvatarUrl('avatarUrl'), new GravatarId('gravatarId'), new UserHtmlUrl('htmlUrl'), new UserApiUrl('apiUrl'), true)), new CommitCommitter(new CommitterName('name'), new EmailAddress('email'), new CommitDate('2018-01-01T00:01:00+00:00'), new CommitCommitterDetails(new UserId(1), new UserLogin('login'), new AccountType('type'), new UserAvatarUrl('avatarUrl'), new GravatarId('gravatarId'), new UserHtmlUrl('htmlUrl'), new UserApiUrl('apiUrl'), true)), new CommitTree(new TreeSha('sha'), new TreeUrl('url')), new CommitParentCollection([new CommitParent(new CommitSha('sha'), new ParentApiUrl('apiUrl'), new ParentHtmlUrl('htmlUrl'))]), new CommitVerification(new VerificationVerified(true), new VerificationReason('reason'), new VerificationSignature('signature'), new VerificationPayload('payload')), new CommitApiUrl('apiUrl'), new CommitHtmlUrl('htmlUrl'));
        $this->protected = true;
        $this->protectionUrl = new BranchProtectionUrl('protectionUrl');
        $this->sut = new GitHubBranch($this->name, $this->commit, $this->protected, $this->protectionUrl);
    }


    public function testGetName()
    {
        self::assertSame($this->name, $this->sut->getName());
    }


    public function testGetCommit()
    {
        self::assertSame($this->commit, $this->sut->getCommit());
    }


    public function testGetProtected()
    {
        self::assertSame($this->protected, $this->sut->getProtected());
    }


    public function testGetProtectionUrl()
    {
        self::assertSame($this->protectionUrl, $this->sut->getProtectionUrl());
    }


    public function testSerialize()
    {
        $expected = [
            'name'=> 'name',
            'commit'=> ['sha'=>'sha', 'message'=>'message', 'commitDate'=>'2018-01-01T00:01:00+00:00', 'author'=>['name'=>'name', 'email'=>'email', 'date'=>'2018-01-01T00:01:00+00:00', 'authorDetails'=>['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]], 'committer'=>['name'=>'name', 'email'=>'email', 'date'=>'2018-01-01T00:01:00+00:00', 'committerDetails'=>['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]], 'tree'=>['sha'=>'sha', 'url'=>'url'], 'parents'=>[['sha'=>'sha', 'apiUrl'=>'apiUrl', 'htmlUrl'=>'htmlUrl']], 'verification'=>['verified'=>true, 'reason'=>'reason', 'signature'=>'signature', 'payload'=>'payload'], 'apiUrl'=>'apiUrl', 'htmlUrl'=>'htmlUrl'],
            'protected'=> true,
            'protectionUrl'=> 'protectionUrl'
        ];

        self::assertSame($expected, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, GitHubBranch::deserialize(json_decode($serialized,true)));
    }
}
