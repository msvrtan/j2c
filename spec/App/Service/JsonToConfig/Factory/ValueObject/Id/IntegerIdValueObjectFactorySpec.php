<?php

declare(strict_types=1);

namespace spec\App\Service\JsonToConfig\Factory\ValueObject\Id;

use App\Service\JsonToConfig\Factory;
use App\Service\JsonToConfig\Factory\ValueObject\Id\IntegerIdValueObjectFactory;
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
