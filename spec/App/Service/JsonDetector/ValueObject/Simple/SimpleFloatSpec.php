<?php

declare(strict_types=1);

namespace spec\App\Service\JsonDetector\ValueObject\Simple;

use App\Service\JsonDetector\ValueObject;
use App\Service\JsonDetector\ValueObject\Simple\SimpleFloat;
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
