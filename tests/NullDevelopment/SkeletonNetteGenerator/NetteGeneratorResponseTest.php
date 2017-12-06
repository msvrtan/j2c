<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonNetteGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\SkeletonNetteGenerator\NetteGeneratorResponse;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonNetteGenerator\NetteGeneratorResponse
 * @group  todo
 */
class NetteGeneratorResponseTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|PhpNamespace */
    private $namespace;
    /** @var NetteGeneratorResponse */
    private $netteGeneratorResponse;

    public function setUp()
    {
        $this->namespace              = new PhpNamespace('MyVendor');
        $this->netteGeneratorResponse = new NetteGeneratorResponse($this->namespace);
    }

    public function testNothing()
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
