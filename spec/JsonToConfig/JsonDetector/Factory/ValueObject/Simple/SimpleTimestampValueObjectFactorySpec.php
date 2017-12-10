<?php

declare(strict_types=1);

namespace spec\JsonToConfig\JsonDetector\Factory\ValueObject\Simple;

use JsonToConfig\JsonDetector\Factory\ValueObject\Simple\SimpleTimestampValueObjectFactory;
use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleTimestamp;
use PhpSpec\ObjectBehavior;

class SimpleTimestampValueObjectFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleTimestampValueObjectFactory::class);
    }

    public function it_is_satisfied_by_timestamp()
    {
        $this->isSatisfiedBy('key', 1494069318)->shouldReturn(true);
    }

    public function it_creats_an_instance_of_simple_timestamp()
    {
        $this->create('key', 1494069318)->shouldReturnAnInstanceOf(SimpleTimestamp::class);
    }
}
