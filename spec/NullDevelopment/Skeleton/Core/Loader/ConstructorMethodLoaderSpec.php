<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\Core\Loader;

use NullDevelopment\Skeleton\Core\Loader\ConstructorMethodLoader;
use PhpSpec\ObjectBehavior;

class ConstructorMethodLoaderSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ConstructorMethodLoader::class);
    }
}
