<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Commit\CommitAuthor;
use DevboardLib\GitHub\Commit\CommitAuthorDetails;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;
use DevboardLib\Git\Commit\Author\AuthorName;
use DevboardLib\Git\Commit\CommitDate;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\CommitAuthor
 * @group  todo
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class CommitAuthorTest extends TestCase
{
    /** @var AuthorName */
    private $name;

    /** @var EmailAddress */
    private $email;

    /** @var CommitDate */
    private $date;

    /** @var CommitAuthorDetails */
    private $authorDetails;

    /** @var CommitAuthor */
    private $sut;


    public function setUp()
    {
        $this->name = new AuthorName('name');
        $this->email = new EmailAddress('value');
        $this->date = new CommitDate('2018-01-01 00:01:00');
        $this->authorDetails = new CommitAuthorDetails(new UserId(1), new UserLogin('login'), new AccountType('type'), new UserAvatarUrl('avatarUrl'), new GravatarId('value'), new UserHtmlUrl('htmlUrl'), new UserApiUrl('apiUrl'), true);
        $this->sut = new CommitAuthor($this->name, $this->email, $this->date, $this->authorDetails);
    }


    public function testGetName()
    {
        self::assertSame($this->name, $this->sut->getName());
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


    public function testSerializeAndDeserialize()
    {
        $serialized = $this->sut->serialize();
        self::assertEquals($this->sut, CommitAuthor::deserialize($serialized));
    }
}
