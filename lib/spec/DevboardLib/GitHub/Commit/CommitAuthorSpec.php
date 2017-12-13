<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\GitHub\Commit\CommitAuthor;
use DevboardLib\GitHub\Commit\CommitAuthorDetails;
use DevboardLib\GitHub\Commit\CommitDate;
use DevboardLib\Git\Commit\Author\AuthorName;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

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


    public function it_exposes_email(EmailAddress $email)
    {
        $this->getEmail()->shouldReturn($email);
    }


    public function it_exposes_date(CommitDate $date)
    {
        $this->getDate()->shouldReturn($date);
    }


    public function it_exposes_authorDetails(CommitAuthorDetails $authorDetails)
    {
        $this->getAuthorDetails()->shouldReturn($authorDetails);
    }


    public function it_is_serializable(AuthorName $name, EmailAddress $email, CommitDate $date, CommitAuthorDetails $authorDetails)
    {
        $name->serialize()->shouldBeCalled()->willReturn('name');
        $email->serialize()->shouldBeCalled()->willReturn('email');
        $date->serialize()->shouldBeCalled()->willReturn('2018-01-01 00:01:00');
        $authorDetails->serialize()->shouldBeCalled()->willReturn([1, 'authorDetails', 'authorDetails', 'authorDetails', 'authorDetails', 'authorDetails', 'authorDetails', true]);
        $this->serialize()->shouldReturn(['name' => 'name', 'email' => 'email', 'date' => '2018-01-01 00:01:00', 'authorDetails' => [1, 'authorDetails', 'authorDetails', 'authorDetails', 'authorDetails', 'authorDetails', 'authorDetails', true]]);
    }


    public function it_is_deserializable()
    {
        $this->deserialize(['name' => 'name', 'email' => 'email', 'date' => '2018-01-01 00:01:00', 'authorDetails' => [1, 'authorDetails', 'authorDetails', 'authorDetails', 'authorDetails', 'authorDetails', 'authorDetails', true]])->shouldReturnAnInstanceOf(CommitAuthor::class);
    }
}
