<?php

declare(strict_types=1);

namespace spec\App\Service\JsonToConfig\ValueObject\Simple;

use App\Service\JsonToConfig\ValueObject;
use App\Service\JsonToConfig\ValueObject\Simple\SimpleBool;
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
