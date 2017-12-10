<?php

declare(strict_types=1);

namespace spec\Miro\ExampleMaker;

use Miro\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\Php\Structure\Variable;
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

    public function it_returns_1_when_asked_for_integer(Variable $variable)
    {
        $variable
            ->getStructureFullName()
            ->shouldBeCalled()
            ->willReturn('int');

        $this
            ->instance($variable)
            ->shouldReturn('1');
    }

    public function it_returns_variable_name_surrounded_with_quotes_when_instance_of_string(Variable $variable)
    {
        $variable
            ->getStructureFullName()
            ->shouldBeCalled()
            ->willReturn('string');
        $variable
            ->getName()
            ->shouldBeCalled()
            ->willReturn('title');

        $this
            ->instance($variable)
            ->shouldReturn("'title'");
    }

    public function it_returns_2_0_when_asked_for_integer(Variable $variable)
    {
        $variable
            ->getStructureFullName()
            ->shouldBeCalled()
            ->willReturn('float');

        $this
            ->instance($variable)
            ->shouldReturn('2.0');
    }

    public function it_returns_true_when_asked_for_boolean(Variable $variable)
    {
        $variable
            ->getStructureFullName()
            ->shouldBeCalled()
            ->willReturn('bool');

        $this
            ->instance($variable)
            ->shouldReturn('true');
    }

    public function it_returns_simple_array_when_asked_for_array(Variable $variable)
    {
        $variable
            ->getStructureFullName()
            ->shouldBeCalled()
            ->willReturn('array');

        $this
            ->instance($variable)
            ->shouldReturn("['data']");
    }

    public function it_returns_first_minute_of_2018_when_asked_for_datetime(Variable $variable)
    {
        $variable
            ->getStructureFullName()
            ->shouldBeCalled()
            ->willReturn('DateTime');

        $this
            ->instance($variable)
            ->shouldReturn("new \DateTime('2018-01-01 00:01:00')");
    }
}
