<?php

declare(strict_types=1);

namespace spec\JsonToConfig\JsonDetector\Factory\ValueObject\Simple;

use JsonToConfig\JsonDetector\Factory;
use JsonToConfig\JsonDetector\Factory\ValueObject\Simple\SimpleCollectionFactory;
use PhpSpec\ObjectBehavior;

class SimpleCollectionFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleCollectionFactory::class);
        $this->shouldImplement(Factory::class);
    }
}
