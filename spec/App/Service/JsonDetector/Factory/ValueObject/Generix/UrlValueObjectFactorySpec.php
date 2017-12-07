<?php

declare(strict_types=1);

namespace spec\App\Service\JsonDetector\Factory\ValueObject\Generix;

use App\Service\JsonDetector\Factory;
use App\Service\JsonDetector\Factory\ValueObject\Generix\UrlValueObjectFactory;
use PhpSpec\ObjectBehavior;

class UrlValueObjectFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(UrlValueObjectFactory::class);
        $this->shouldImplement(Factory::class);
    }
}
