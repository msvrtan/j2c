<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Branch;

use DevboardLib\GitHub\Branch\BranchProtectionUrl;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BranchProtectionUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($protectionUrl = 'protectionUrl');
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(BranchProtectionUrl::class);
    }


    public function it_exposes_protectionUrl()
    {
        $this->getProtectionUrl()->shouldReturn('protectionUrl');
    }


    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('protectionUrl');
    }


    public function it_is_serializable()
    {
        $this->serialize()->shouldReturn('protectionUrl');
    }


    public function it_is_deserializable()
    {
        $this->deserialize('protectionUrl')->shouldReturnAnInstanceOf(BranchProtectionUrl::class);
    }
}
