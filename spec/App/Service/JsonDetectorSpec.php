<?php

declare(strict_types=1);

namespace spec\App\Service;

use App\Service\JsonDetector;
use PhpSpec\ObjectBehavior;

class JsonDetectorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(JsonDetector::class);
    }
}
