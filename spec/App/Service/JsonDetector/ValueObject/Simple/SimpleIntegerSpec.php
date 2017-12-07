<?php

declare(strict_types=1);

namespace spec\App\Service\JsonDetector\ValueObject\Simple;

use App\Service\JsonDetector\ValueObject;
use App\Service\JsonDetector\ValueObject\Simple\SimpleInteger;
use PhpSpec\ObjectBehavior;

class SimpleIntegerSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($key = 'someNumber');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleInteger::class);
        $this->shouldImplement(ValueObject::class);
    }
}
