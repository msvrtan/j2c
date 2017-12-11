<?php

declare(strict_types=1);

namespace spec\Miro\ExampleMaker;

use Miro\ExampleMaker\ExampleMaker;
use PhpSpec\ObjectBehavior;

class ExampleMakerSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ExampleMaker::class);
    }
}
