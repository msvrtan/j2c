<?php

declare(strict_types=1);

namespace spec\JsonToConfig\JsonDetector\ValueObject\Simple;

use JsonToConfig\JsonDetector\ValueObject;
use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleDateTime;
use PhpSpec\ObjectBehavior;

class SimpleDateTimeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($key = 'createdAt');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleDateTime::class);
        $this->shouldImplement(ValueObject::class);
    }
}
