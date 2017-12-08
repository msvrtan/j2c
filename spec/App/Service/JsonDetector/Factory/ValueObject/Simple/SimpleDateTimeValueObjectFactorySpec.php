<?php

declare(strict_types=1);

namespace spec\App\Service\JsonDetector\Factory\ValueObject\Simple;

use App\Service\JsonDetector\Factory;
use App\Service\JsonDetector\Factory\ValueObject\Simple\SimpleDateTimeValueObjectFactory;
use App\Service\JsonDetector\ValueObject\Simple\SimpleDateTime;
use PhpSpec\ObjectBehavior;

class SimpleDateTimeValueObjectFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleDateTimeValueObjectFactory::class);
        $this->shouldImplement(Factory::class);
    }

    public function it_is_satisfied_by_regular_format()
    {
        $this->isSatisfiedBy('key', '2017-05-06 11:15:18')->shouldReturn(true);
    }

    public function it_creats_an_instance_of_simple_date_time()
    {
        $this->create('key', '2017-05-06 11:15:18')->shouldReturnAnInstanceOf(SimpleDateTime::class);
    }
}
