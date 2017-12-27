<?php

declare(strict_types=1);

namespace Tests\TestCase;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;

class Fixtures
{
    public static function firstName(): ClassName
    {
        return ClassName::create('MyVendor\\User\\UserFirstName');
    }

    public static function firstNameProperty(): Property
    {
        return new Property(
            'firstName',
            self::firstName(),
            false,
            false,
            false,
            new Visibility('private')
        );
    }
}
