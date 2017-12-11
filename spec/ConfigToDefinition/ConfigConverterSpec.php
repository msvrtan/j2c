<?php

declare(strict_types=1);

namespace spec\ConfigToDefinition;

use ConfigToDefinition\ConfigConverter;
use PhpSpec\ObjectBehavior;

class ConfigConverterSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ConfigConverter::class);
    }
}
