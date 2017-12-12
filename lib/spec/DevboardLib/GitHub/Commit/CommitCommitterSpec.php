<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\GitHub\Commit\CommitCommitter;
use DevboardLib\GitHub\Commit\CommitCommitterDetails;
use DevboardLib\GitHub\Commit\CommitDate;
use DevboardLib\GitHub\Commit\Committer\CommitterName;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommitCommitterSpec extends ObjectBehavior
{
    public function let(CommitterName $name, EmailAddress $email, CommitDate $date, CommitCommitterDetails $committerDetails)
    {
        $this->beConstructedWith($name, $email, $date, $committerDetails);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitCommitter::class);
    }


    public function it_exposes_name(CommitterName $name)
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


    public function it_exposes_committerDetails(CommitCommitterDetails $committerDetails)
    {
        $this->getCommitterDetails()->shouldReturn($committerDetails);
    }


    public function it_is_serializable(CommitterName $name, EmailAddress $email, CommitDate $date, CommitCommitterDetails $committerDetails)
    {
        $name->serialize()->shouldBeCalled()->willReturn('name');
        $email->serialize()->shouldBeCalled()->willReturn('email');
        $date->serialize()->shouldBeCalled()->willReturn('2018-01-01 00:01:00');
        $committerDetails->serialize()->shouldBeCalled()->willReturn([1, 'committerDetails', 'committerDetails', 'committerDetails', 'committerDetails', 'committerDetails', 'committerDetails', true]);
        $this->serialize()->shouldReturn(['name' => 'name', 'email' => 'email', 'date' => '2018-01-01 00:01:00', 'committerDetails' => [1, 'committerDetails', 'committerDetails', 'committerDetails', 'committerDetails', 'committerDetails', 'committerDetails', true]]);
    }


    public function it_is_deserializable()
    {
        $this->deserialize(['name' => 'name', 'email' => 'email', 'date' => '2018-01-01 00:01:00', 'committerDetails' => [1, 'committerDetails', 'committerDetails', 'committerDetails', 'committerDetails', 'committerDetails', 'committerDetails', true]])->shouldReturnAnInstanceOf(CommitCommitter::class);
    }
}
