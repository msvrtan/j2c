<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\GitHub\Commit\Author\AuthorName;
use DevboardLib\GitHub\Commit\CommitAuthor;
use DevboardLib\GitHub\Commit\CommitAuthorDetails;
use DevboardLib\GitHub\Commit\CommitDate;
use PhpSpec\ObjectBehavior;

class CommitAuthorSpec extends ObjectBehavior
{
    public function let(AuthorName $name, EmailAddress $email, CommitDate $date, CommitAuthorDetails $authorDetails)
    {
        $this->beConstructedWith($name, $email, $date, $authorDetails);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitAuthor::class);
    }


    public function it_exposes_name(AuthorName $name)
    {
        $this->getName()->shouldReturn($name);
    }


    public function it_exposes_id(CommitAuthorDetails $authorDetails)
    {
        $this->getId()->shouldReturn($authorDetails);
    }


    public function it_exposes_email(EmailAddress $email)
    {
        $this->getEmail()->shouldReturn($email);
    }


    public function it_exposes_date(CommitDate $date)
    {
        $this->getDate()->shouldReturn($date);
    }


    public function it_exposes_author_details(CommitAuthorDetails $authorDetails)
    {
        $this->getAuthorDetails()->shouldReturn($authorDetails);
    }


    public function it_can_be_serialized(AuthorName $name, EmailAddress $email, CommitDate $date, CommitAuthorDetails $authorDetails)
    {
        $name->serialize()->shouldBeCalled()->willReturn('name');
        $email->serialize()->shouldBeCalled()->willReturn('email');
        $date->serialize()->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $authorDetails->serialize()->shouldBeCalled()->willReturn(['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]);
        $this->serialize()->shouldReturn(['name' => 'name', 'email' => 'email', 'date' => '2018-01-01T00:01:00+00:00', 'authorDetails' => ['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]]);
    }


    public function it_can_be_deserialized(AuthorName $name, EmailAddress $email, CommitDate $date, CommitAuthorDetails $authorDetails)
    {
        $this->deserialize(['name' => 'name', 'email' => 'email', 'date' => '2018-01-01T00:01:00+00:00', 'authorDetails' => ['id'=>1, 'login'=>'login', 'type'=>'type', 'avatarUrl'=>'avatarUrl', 'gravatarId'=>'gravatarId', 'htmlUrl'=>'htmlUrl', 'apiUrl'=>'apiUrl', 'siteAdmin'=>true]])->shouldReturnAnInstanceOf(CommitAuthor::class);
    }
}
