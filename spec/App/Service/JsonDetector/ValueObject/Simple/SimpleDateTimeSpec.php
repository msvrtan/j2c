<?php

declare(strict_types=1);

namespace spec\App\Service\JsonDetector\ValueObject\Simple;

use App\Service\JsonDetector\ValueObject;
use App\Service\JsonDetector\ValueObject\Simple\SimpleDateTime;
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
