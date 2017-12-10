<?php

declare(strict_types=1);

namespace spec\JsonToConfig\JsonDetector\ValueObject\Generix;

use JsonToConfig\JsonDetector\ValueObject;
use JsonToConfig\JsonDetector\ValueObject\Generix\Url;
use PhpSpec\ObjectBehavior;

class UrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($key = 'some_url');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Url::class);
        $this->shouldImplement(ValueObject::class);
    }
}
