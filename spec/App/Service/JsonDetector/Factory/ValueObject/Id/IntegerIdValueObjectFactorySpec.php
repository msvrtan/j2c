<?php

declare(strict_types=1);

namespace spec\App\Service\JsonDetector\Factory\ValueObject\Id;

use App\Service\JsonDetector\Factory;
use App\Service\JsonDetector\Factory\ValueObject\Id\IntegerIdValueObjectFactory;
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
