<?php

declare(strict_types=1);

namespace Miro\ExampleMaker;

interface Example
{
    public function __toString(): string;

    public function classesToImport(): array;
}
