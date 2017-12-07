<?php

declare(strict_types=1);

namespace spec\App\Service\JsonDetector\ValueObject\Simple;

use App\Service\JsonDetector\ValueObject;
use App\Service\JsonDetector\ValueObject\Simple\SimpleString;
use PhpSpec\ObjectBehavior;

class SimpleStringSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($key = 'name');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleString::class);
        $this->shouldImplement(ValueObject::class);
    }
}
