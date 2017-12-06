<?php

declare(strict_types=1);

namespace spec\App\Service\JsonToConfig\Factory\ValueObject\Simple;

use App\Service\JsonToConfig\Factory;
use App\Service\JsonToConfig\Factory\ValueObject\Simple\SimpleBoolValueObjectFactory;
use PhpSpec\ObjectBehavior;

class SimpleBoolValueObjectFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleBoolValueObjectFactory::class);
        $this->shouldImplement(Factory::class);
    }
}
