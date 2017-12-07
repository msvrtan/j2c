<?php

declare(strict_types=1);

namespace spec\App\Service\JsonDetector\Factory\ValueObject\Simple;

use App\Service\JsonDetector\Factory;
use App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleIntegerValueObjectFactory;
use App\Service\JsonDetector\ValueObject\Simple\SimpleInteger;
use PhpSpec\ObjectBehavior;

class SimpleIntegerValueObjectFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleIntegerValueObjectFactory::class);
        $this->shouldImplement(Factory::class);
    }

    public function it_should_satisfy_for_value_of_integer_type()
    {
        $this->isSatisfiedBy('key', 1)->shouldReturn(true);
    }

    public function it_should_reject_strings()
    {
        $this->isSatisfiedBy('key', 'John')->shouldReturn(false);
    }

    public function it_will_create_simple_integer_value_object()
    {
        $this->create('key')->shouldReturnAnInstanceOf(SimpleInteger::class);
    }
}
