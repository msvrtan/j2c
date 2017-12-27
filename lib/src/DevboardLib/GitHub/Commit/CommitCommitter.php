<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\GitHub\Commit\Committer\CommitterName;

class CommitCommitter
{
    /** @var CommitterName */
    private $name;

    /** @var EmailAddress */
    private $email;

    /** @var CommitDate */
    private $date;

    /** @var CommitCommitterDetails|null */
    private $committerDetails;


    public function __construct(CommitterName $name, EmailAddress $email, CommitDate $date, ?CommitCommitterDetails $committerDetails)
    {
        $this->name = $name;
        $this->email = $email;
        $this->date = $date;
        $this->committerDetails = $committerDetails;
    }


    public function getName(): CommitterName
    {
        return $this->name;
    }


    public function getId(): ?CommitCommitterDetails
    {
        return $this->committerDetails;
    }


    public function getEmail(): EmailAddress
    {
        return $this->email;
    }


    public function getDate(): CommitDate
    {
        return $this->date;
    }


    public function getCommitterDetails(): ?CommitCommitterDetails
    {
        return $this->committerDetails;
    }


    public function serialize(): array
    {
        if(null === $this->committerDetails){
            $committerDetails = null;
        }else{
            $committerDetails = $this->committerDetails->serialize();
        }

        return [
            'name' => $this->name->serialize(),
            'email' => $this->email->serialize(),
            'date' => $this->date->serialize(),
            'committerDetails' => $committerDetails
        ];
    }


    public static function deserialize(array $data): self
    {
        if(null === $data['committerDetails']){
            $committerDetails = null;
        }else{
            $committerDetails = CommitCommitterDetails::deserialize($data['committerDetails']);
        }

        return new self(
            CommitterName::deserialize($data['name']),
            EmailAddress::deserialize($data['email']),
            CommitDate::deserialize($data['date']),
            $committerDetails
        );
    }
}
