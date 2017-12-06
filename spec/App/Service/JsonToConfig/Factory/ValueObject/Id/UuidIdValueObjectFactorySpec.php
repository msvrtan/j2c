<?php

declare(strict_types=1);

namespace spec\App\Service\JsonToConfig\Factory\ValueObject\Id;

use App\Service\JsonToConfig\Factory;
use App\Service\JsonToConfig\Factory\ValueObject\Id\UuidIdValueObjectFactory;
use PhpSpec\ObjectBehavior;

class UuidIdValueObjectFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(UuidIdValueObjectFactory::class);
        $this->shouldImplement(Factory::class);
    }
}
