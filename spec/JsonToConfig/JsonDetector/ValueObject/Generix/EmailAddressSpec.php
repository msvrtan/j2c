<?php

declare(strict_types=1);

namespace spec\JsonToConfig\JsonDetector\ValueObject\Generix;

use JsonToConfig\JsonDetector\ValueObject;
use JsonToConfig\JsonDetector\ValueObject\Generix\EmailAddress;
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
