<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\Php\Structure;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use NullDevelopment\Skeleton\Php\Structure\CollectionOf;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\Php\Structure\CollectionOf
 * @group todo
 */
class CollectionOfTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ClassName */
    private $className;
    /** @var string */
    private $accessor;
    /** @var MockInterface|ClassName */
    private $has;
    /** @var CollectionOf */
    private $collectionOf;

    public function setUp()
    {
        $this->className    = Mockery::mock(ClassName::class);
        $this->accessor     = 'accessor';
        $this->has          = Mockery::mock(ClassName::class);
        $this->collectionOf = new CollectionOf($this->className, $this->accessor, $this->has);
    }

    public function testGetClassName()
    {
        self::assertEquals($this->className, $this->collectionOf->getClassName());
    }

    public function testGetAccessor()
    {
        self::assertEquals($this->accessor, $this->collectionOf->getAccessor());
    }

    public function testGetHas()
    {
        self::assertEquals($this->has, $this->collectionOf->getHas());
    }
}
