<?php

declare(strict_types=1);

namespace spec\JsonToConfig\JsonDetector\Factory\ValueObject\Simple;

use JsonToConfig\JsonDetector\Factory;
use JsonToConfig\JsonDetector\Factory\ValueObject\Simple\SimpleFloatValueObjectFactory;
use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleFloat;
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

    public function it_is_satisfied_by_float_value()
    {
        $this->isSatisfiedBy('key', 1.0)->shouldReturn(true);
    }

    public function it_creats_an_instance_of_simple_float()
    {
        $this->create('key', 1.0)->shouldReturnAnInstanceOf(SimpleFloat::class);
    }
}