<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\Core\Loader;

use NullDevelopment\Skeleton\Core\ConfigurationLoader;
use NullDevelopment\Skeleton\Core\Loader\InterfaceLoader;
use PhpSpec\ObjectBehavior;

class InterfaceLoaderSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InterfaceLoader::class);
        $this->shouldImplement(ConfigurationLoader::class);
    }
}
