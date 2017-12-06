<?php

declare(strict_types=1);

namespace spec\App\Service\JsonToConfig\ValueObject\Generix;

use App\Service\JsonToConfig\ValueObject;
use App\Service\JsonToConfig\ValueObject\Generix\EmailAddress;
use PhpSpec\ObjectBehavior;

class EmailAddressSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($key = 'e-mail');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(EmailAddress::class);
        $this->shouldImplement(ValueObject::class);
    }
}
