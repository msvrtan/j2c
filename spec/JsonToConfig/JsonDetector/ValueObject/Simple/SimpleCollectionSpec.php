<?php

declare(strict_types=1);

namespace spec\JsonToConfig\JsonDetector\ValueObject\Simple;

use JsonToConfig\JsonDetector\ValueObject;
use JsonToConfig\JsonDetector\ValueObject\Simple\SimpleCollection;
use PhpSpec\ObjectBehavior;

class SimpleCollectionSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($key = 'users');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleCollection::class);
        $this->shouldImplement(ValueObject::class);
    }
}
