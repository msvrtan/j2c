<?php

declare(strict_types=1);

namespace spec\DevboardLib\Generix;

use DevboardLib\Generix\GravatarId;
use PhpSpec\ObjectBehavior;

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


    public function it_exposes_gravatar_id()
    {
        $this->getGravatarId()->shouldReturn('gravatarId');
    }


    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('gravatarId');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('gravatarId');
    }


    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('gravatarId');
    }


    public function it_can_be_deserialized()
    {
        $this->deserialize('gravatarId')->shouldReturnAnInstanceOf(GravatarId::class);
    }
}
