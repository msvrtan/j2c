<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\GitHub\Commit\Author\AuthorName;

class CommitAuthor
{
    /** @var AuthorName */
    private $name;

    /** @var EmailAddress */
    private $email;

    /** @var CommitDate */
    private $date;

    /** @var CommitAuthorDetails|null */
    private $authorDetails;


    public function __construct(AuthorName $name, EmailAddress $email, CommitDate $date, ?CommitAuthorDetails $authorDetails)
    {
        $this->name = $name;
        $this->email = $email;
        $this->date = $date;
        $this->authorDetails = $authorDetails;
    }


    public function getName(): AuthorName
    {
        return $this->name;
    }


    public function getEmail(): EmailAddress
    {
        return $this->email;
    }


    public function getDate(): CommitDate
    {
        return $this->date;
    }


    public function getAuthorDetails(): ?CommitAuthorDetails
    {
        return $this->authorDetails;
    }


    public function serialize(): array
    {
        if(null === $this->authorDetails){
            $authorDetails = null;
        }else{
            $authorDetails = $this->authorDetails->serialize();
        }

        return [
            'name' => $this->name->serialize(),
            'email' => $this->email->serialize(),
            'date' => $this->date->serialize(),
            'authorDetails' => $authorDetails
        ];
    }


    public static function deserialize(array $data): self
    {
        if(null === $data['authorDetails']){
            $authorDetails = null;
        }else{
            $authorDetails = CommitAuthorDetails::deserialize($data['authorDetails']);
        }

        return new self(
            AuthorName::deserialize($data['name']),
            EmailAddress::deserialize($data['email']),
            CommitDate::deserialize($data['date']),
            $authorDetails
        );
    }
}
