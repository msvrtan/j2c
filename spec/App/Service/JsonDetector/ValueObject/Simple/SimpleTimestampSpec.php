<?php

declare(strict_types=1);

namespace spec\App\Service\JsonDetector\ValueObject\Simple;

use App\Service\JsonDetector\ValueObject;
use App\Service\JsonDetector\ValueObject\Simple\SimpleTimestamp;
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
