<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode;

use Nette\PhpGenerator\ClassType as NetteClass;
use NullDevelopment\PhpStructure\Type\ClassType;

class Result
{
    /** @var ClassType */
    private $classType;
    /** @var NetteClass */
    private $generated;

    public function __construct(ClassType $classType, NetteClass $generated)
    {
        $this->classType = $classType;
        $this->generated = $generated;
    }

    public function getClassType(): ClassType
    {
        return $this->classType;
    }

    public function getGenerated(): NetteClass
    {
        return $this->generated;
    }
}
