<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Commit\Author\AuthorName;
use DevboardLib\GitHub\Commit\CommitAuthor;
use DevboardLib\GitHub\Commit\CommitAuthorDetails;
use DevboardLib\GitHub\Commit\CommitDate;
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
class CommitAuthorTest extends TestCase
{
    /** @var AuthorName */
    private $name;

    /** @var EmailAddress */
    private $email;

    /** @var CommitDate */
    private $date;

    /** @var CommitAuthorDetails|null */
    private $authorDetails;

    /** @var CommitAuthor */
    private $sut;


    public function setUp()
    {
        $this->name = new AuthorName('name');
        $this->email = new EmailAddress('email');
        $this->date = new CommitDate('2018-01-01T00:01:00+00:00');
        $this->authorDetails = new CommitAuthorDetails(new UserId(1), new UserLogin('login'), new AccountType('type'), new UserAvatarUrl('avatarUrl'), new GravatarId('gravatarId'), new UserHtmlUrl('htmlUrl'), new UserApiUrl('apiUrl'), true);
        $this->sut = new CommitAuthor($this->name, $this->email, $this->date, $this->authorDetails);
    }


    public function testGetName()
    {
        self::assertSame($this->name, $this->sut->getName());
    }


    public function testGetId()
    {
        self::assertSame($this->authorDetails, $this->sut->getId());
    }


    public function testGetEmail()
    {
        self::assertSame($this->email, $this->sut->getEmail());
    }


    public function testGetDate()
    {
        self::assertSame($this->date, $this->sut->getDate());
    }


    public function testGetAuthorDetails()
    {
        self::assertSame($this->authorDetails, $this->sut->getAuthorDetails());
    }


    public function testSerialize()
    {
        $expected = [
            'name'=> 'name',
            'email'=> 'email',
            'date'=> '2018-01-01T00:01:00+00:00',
            'authorDetails'=> ['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]
        ];

        self::assertSame($expected, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, CommitAuthor::deserialize(json_decode($serialized,true)));
    }
}
