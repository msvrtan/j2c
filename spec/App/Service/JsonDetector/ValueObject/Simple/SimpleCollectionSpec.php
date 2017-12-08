<?php

declare(strict_types=1);

namespace spec\App\Service\JsonDetector\ValueObject\Simple;

use App\Service\JsonDetector\ValueObject;
use App\Service\JsonDetector\ValueObject\Simple\SimpleCollection;
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
