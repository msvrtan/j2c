<?php

declare(strict_types=1);

namespace spec\App\Service\JsonDetector\ValueObject\Id;

use App\Service\JsonDetector\ValueObject;
use App\Service\JsonDetector\ValueObject\Id\IntegerId;
use PhpSpec\ObjectBehavior;

class IntegerIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($key = 'some_id');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(IntegerId::class);
        $this->shouldImplement(ValueObject::class);
    }
}
