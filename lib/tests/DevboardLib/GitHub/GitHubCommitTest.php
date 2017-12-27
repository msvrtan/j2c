<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountType;
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
class GitHubCommitTest extends TestCase
{
    /** @var CommitSha */
    private $sha;

    /** @var CommitMessage */
    private $message;

    /** @var CommitDate */
    private $commitDate;

    /** @var CommitAuthor */
    private $author;

    /** @var CommitCommitter */
    private $committer;

    /** @var CommitTree */
    private $tree;

    /** @var CommitParentCollection */
    private $parents;

    /** @var CommitVerification */
    private $verification;

    /** @var CommitApiUrl */
    private $apiUrl;

    /** @var CommitHtmlUrl */
    private $htmlUrl;

    /** @var GitHubCommit */
    private $sut;


    public function setUp()
    {
        $this->sha = new CommitSha('sha');
        $this->message = new CommitMessage('message');
        $this->commitDate = new CommitDate('2018-01-01T00:01:00+00:00');
        $this->author = new CommitAuthor(new AuthorName('name'), new EmailAddress('email'), new CommitDate('2018-01-01T00:01:00+00:00'), new CommitAuthorDetails(new UserId(1), new UserLogin('login'), new AccountType('type'), new UserAvatarUrl('avatarUrl'), new GravatarId('gravatarId'), new UserHtmlUrl('htmlUrl'), new UserApiUrl('apiUrl'), true));
        $this->committer = new CommitCommitter(new CommitterName('name'), new EmailAddress('email'), new CommitDate('2018-01-01T00:01:00+00:00'), new CommitCommitterDetails(new UserId(1), new UserLogin('login'), new AccountType('type'), new UserAvatarUrl('avatarUrl'), new GravatarId('gravatarId'), new UserHtmlUrl('htmlUrl'), new UserApiUrl('apiUrl'), true));
        $this->tree = new CommitTree(new TreeSha('sha'), new TreeUrl('url'));
        $this->parents = new CommitParentCollection([new CommitParent(new CommitSha('sha'), new ParentApiUrl('apiUrl'), new ParentHtmlUrl('htmlUrl'))]);
        $this->verification = new CommitVerification(new VerificationVerified(true), new VerificationReason('reason'), new VerificationSignature('signature'), new VerificationPayload('payload'));
        $this->apiUrl = new CommitApiUrl('apiUrl');
        $this->htmlUrl = new CommitHtmlUrl('htmlUrl');
        $this->sut = new GitHubCommit($this->sha, $this->message, $this->commitDate, $this->author, $this->committer, $this->tree, $this->parents, $this->verification, $this->apiUrl, $this->htmlUrl);
    }


    public function testGetSha()
    {
        self::assertSame($this->sha, $this->sut->getSha());
    }


    public function testGetMessage()
    {
        self::assertSame($this->message, $this->sut->getMessage());
    }


    public function testGetCommitDate()
    {
        self::assertSame($this->commitDate, $this->sut->getCommitDate());
    }


    public function testGetAuthor()
    {
        self::assertSame($this->author, $this->sut->getAuthor());
    }


    public function testGetCommitter()
    {
        self::assertSame($this->committer, $this->sut->getCommitter());
    }


    public function testGetTree()
    {
        self::assertSame($this->tree, $this->sut->getTree());
    }


    public function testGetParents()
    {
        self::assertSame($this->parents, $this->sut->getParents());
    }


    public function testGetVerification()
    {
        self::assertSame($this->verification, $this->sut->getVerification());
    }


    public function testGetApiUrl()
    {
        self::assertSame($this->apiUrl, $this->sut->getApiUrl());
    }


    public function testGetHtmlUrl()
    {
        self::assertSame($this->htmlUrl, $this->sut->getHtmlUrl());
    }


    public function testSerialize()
    {
        $expected = [
            'sha'=> 'sha',
            'message'=> 'message',
            'commitDate'=> '2018-01-01T00:01:00+00:00',
            'author'=> ['name'=>'name', 'email'=>'email', 'date'=>'2018-01-01T00:01:00+00:00', 'authorDetails'=>['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]],
            'committer'=> ['name'=>'name', 'email'=>'email', 'date'=>'2018-01-01T00:01:00+00:00', 'committerDetails'=>['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]],
            'tree'=> ['sha'=>'sha', 'url'=>'url'],
            'parents'=> [['sha'=>'sha', 'apiUrl'=>'apiUrl', 'htmlUrl'=>'htmlUrl']],
            'verification'=> ['verified'=>true, 'reason'=>'reason', 'signature'=>'signature', 'payload'=>'payload'],
            'apiUrl'=> 'apiUrl',
            'htmlUrl'=> 'htmlUrl'
        ];

        self::assertSame($expected, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, GitHubCommit::deserialize(json_decode($serialized,true)));
    }
}
