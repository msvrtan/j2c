<?php

declare(strict_types=1);

namespace spec\App\Service\JsonDetector\ValueObject\Generix;

use App\Service\JsonDetector\ValueObject;
use App\Service\JsonDetector\ValueObject\Generix\EmailAddress;
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
