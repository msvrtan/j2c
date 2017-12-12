<?php

declare(strict_types=1);

namespace spec\DevboardLib\Generix;

use DevboardLib\Generix\GravatarId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GravatarIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($gravatarId = 'gravatarId');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(GravatarId::class);
    }


    public function it_exposes_gravatarId()
    {
        $this->getGravatarId()->shouldReturn('gravatarId');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('gravatarId');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('gravatarId');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('gravatarId')->shouldReturnAnInstanceOf(GravatarId::class);
    }
}
