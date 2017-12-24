<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Path\Readers;

use Symfony\Component\Finder\Finder;

/**
 * @see FinderFactorySpec
 * @see FinderFactoryTest
 */
class FinderFactory
{
    public function create(): Finder
    {
        return new Finder();
    }
}
