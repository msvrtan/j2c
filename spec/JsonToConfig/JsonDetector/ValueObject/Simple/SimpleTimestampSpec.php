<?php

declare(strict_types=1);

namespace spec\JsonToConfig\JsonDetector\ValueObject\Simple;

use JsonToConfig\JsonDetector\ValueObject;
use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleTimestamp;
use PhpSpec\ObjectBehavior;

class SimpleTimestampSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($key = 'createdAt');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleTimestamp::class);
        $this->shouldImplement(ValueObject::class);
    }
}
