<?php

declare(strict_types=1);

namespace spec\App\Service\JsonToConfig\Factory\ValueObject\Simple;

use App\Service\JsonToConfig\Factory;
use App\Service\JsonToConfig\Factory\ValueObject\Simple\SimpleFloatValueObjectFactory;
use PhpSpec\ObjectBehavior;

class SimpleFloatValueObjectFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleFloatValueObjectFactory::class);
        $this->shouldImplement(Factory::class);
    }
}
