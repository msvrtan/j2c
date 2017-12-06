<?php

declare(strict_types=1);

namespace spec\App\Service;

use App\Service\JsonToConfig;
use PhpSpec\ObjectBehavior;

class JsonToConfigSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(JsonToConfig::class);
    }
}
