<?php

declare(strict_types=1);

namespace spec\JsonToConfig\JsonDetector\Factory\ValueObject\Id;

use JsonToConfig\JsonDetector\Factory;
use JsonToConfig\JsonDetector\Factory\ValueObject\Id\UuidIdValueObjectFactory;
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
