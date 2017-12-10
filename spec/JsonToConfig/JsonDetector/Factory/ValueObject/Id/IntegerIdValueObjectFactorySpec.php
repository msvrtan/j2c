<?php

declare(strict_types=1);

namespace spec\JsonToConfig\JsonDetector\Factory\ValueObject\Id;

use JsonToConfig\JsonDetector\Factory;
use JsonToConfig\JsonDetector\Factory\ValueObject\Id\IntegerIdValueObjectFactory;
use PhpSpec\ObjectBehavior;

class IntegerIdValueObjectFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(IntegerIdValueObjectFactory::class);
        $this->shouldImplement(Factory::class);
    }
}
