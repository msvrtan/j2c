<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Commit\CommitCommitter;
use DevboardLib\GitHub\Commit\CommitCommitterDetails;
use DevboardLib\GitHub\Commit\CommitDate;
use DevboardLib\GitHub\Commit\Committer\CommitterName;
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
class CommitCommitterTest extends TestCase
{
    /** @var CommitterName */
    private $name;

    /** @var EmailAddress */
    private $email;

    /** @var CommitDate */
    private $date;

    /** @var CommitCommitterDetails|null */
    private $committerDetails;

    /** @var CommitCommitter */
    private $sut;


    public function setUp()
    {
        $this->name = new CommitterName('name');
        $this->email = new EmailAddress('email');
        $this->date = new CommitDate('2018-01-01T00:01:00+00:00');
        $this->committerDetails = new CommitCommitterDetails(new UserId(1), new UserLogin('login'), new AccountType('type'), new UserAvatarUrl('avatarUrl'), new GravatarId('gravatarId'), new UserHtmlUrl('htmlUrl'), new UserApiUrl('apiUrl'), true);
        $this->sut = new CommitCommitter($this->name, $this->email, $this->date, $this->committerDetails);
    }


    public function testGetName()
    {
        self::assertSame($this->name, $this->sut->getName());
    }


    public function testGetId()
    {
        self::assertSame($this->committerDetails, $this->sut->getId());
    }


    public function testGetEmail()
    {
        self::assertSame($this->email, $this->sut->getEmail());
    }


    public function testGetDate()
    {
        self::assertSame($this->date, $this->sut->getDate());
    }


    public function testGetCommitterDetails()
    {
        self::assertSame($this->committerDetails, $this->sut->getCommitterDetails());
    }


    public function testSerialize()
    {
        $expected = [
            'name'=> 'name',
            'email'=> 'email',
            'date'=> '2018-01-01T00:01:00+00:00',
            'committerDetails'=> ['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]
        ];

        self::assertSame($expected, $this->sut->serialize());
    }


    public function testDeserialize()
    {
        $serialized = $this->sut->serialize();
        self::assertEquals($this->sut, CommitCommitter::deserialize($serialized));
    }
}
