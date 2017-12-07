<?php

declare(strict_types=1);

namespace spec\App\Service\JsonDetector\ValueObject\Id;

use App\Service\JsonDetector\ValueObject;
use App\Service\JsonDetector\ValueObject\Id\UuidId;
use PhpSpec\ObjectBehavior;

class UuidIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($key = 'some_id');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(UuidId::class);
        $this->shouldImplement(ValueObject::class);
    }
}
