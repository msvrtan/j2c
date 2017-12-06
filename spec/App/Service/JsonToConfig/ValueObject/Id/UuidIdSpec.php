<?php

declare(strict_types=1);

namespace spec\App\Service\JsonToConfig\ValueObject\Id;

use App\Service\JsonToConfig\ValueObject;
use App\Service\JsonToConfig\ValueObject\Id\UuidId;
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
