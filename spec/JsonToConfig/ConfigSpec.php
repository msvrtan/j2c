<?php

declare(strict_types=1);

namespace spec\JsonToConfig;

use JsonToConfig\Config;
use PhpSpec\ObjectBehavior;

class ConfigSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($baseName = '', $namespace = '', []);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Config::class);
    }
}
