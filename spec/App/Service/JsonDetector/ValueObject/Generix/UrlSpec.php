<?php

declare(strict_types=1);

namespace spec\App\Service\JsonDetector\ValueObject\Generix;

use App\Service\JsonDetector\ValueObject;
use App\Service\JsonDetector\ValueObject\Generix\Url;
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
