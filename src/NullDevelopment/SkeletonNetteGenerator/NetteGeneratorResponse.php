<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator;

use Nette\PhpGenerator\PhpNamespace;

class NetteGeneratorResponse
{
    /**
     * @var PhpNamespace
     */
    private $namespace;

    public function __construct(PhpNamespace $namespace)
    {
        $this->namespace = $namespace;
    }
}
