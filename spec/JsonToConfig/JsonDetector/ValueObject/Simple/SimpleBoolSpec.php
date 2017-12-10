<?php

declare(strict_types=1);

namespace spec\JsonToConfig\JsonDetector\ValueObject\Simple;

use JsonToConfig\JsonDetector\ValueObject;
use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleBool;
use PhpSpec\ObjectBehavior;

class SimpleBoolSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($key = 'active');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleBool::class);
        $this->shouldImplement(ValueObject::class);
    }
}
