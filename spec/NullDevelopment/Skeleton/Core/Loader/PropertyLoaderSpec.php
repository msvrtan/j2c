<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\Core\Loader;

use NullDevelopment\Skeleton\Core\ConfigurationLoader;
use NullDevelopment\Skeleton\Core\Loader\PropertyLoader;
use PhpSpec\ObjectBehavior;

class PropertyLoaderSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(PropertyLoader::class);
        $this->shouldImplement(ConfigurationLoader::class);
    }
}
