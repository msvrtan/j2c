<?php

declare(strict_types=1);

namespace spec\JsonToConfig\JsonDetector\ValueObject\Simple;

use JsonToConfig\JsonDetector\ValueObject;
use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleFloat;
use PhpSpec\ObjectBehavior;

class SimpleFloatSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($key = 'amount');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleFloat::class);
        $this->shouldImplement(ValueObject::class);
    }
}
