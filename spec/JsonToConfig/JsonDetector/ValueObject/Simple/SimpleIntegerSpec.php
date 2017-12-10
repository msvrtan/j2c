<?php

declare(strict_types=1);

namespace spec\JsonToConfig\JsonDetector\ValueObject\Simple;

use JsonToConfig\JsonDetector\ValueObject;
use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleInteger;
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
