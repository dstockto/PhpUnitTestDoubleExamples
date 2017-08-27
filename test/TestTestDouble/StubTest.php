<?php
declare(strict_types=1);

namespace TestTestDouble;

use PHPUnit\Framework\TestCase;
use TestDouble\SomeClass;

class StubTest extends TestCase
{
    /**
     * @test
     */
    public function createMockStub()
    {
        $stub = $this->createMock(SomeClass::class);
        $stub->method('doSomething')->willReturn('foo');

        $this->assertEquals('foo', $stub->doSomething());
    }

    /**
     * @test
     */
    public function prophecyStub()
    {
        $stub = $this->prophesize(SomeClass::class);
        $stub->doSomething()->willReturn('foo');

        $this->assertEquals('foo', $stub->reveal()->doSomething());
    }

    /**
     * @test
     */
    public function mockBuilderStub()
    {
        $stub = $this->getMockBuilder(SomeClass::class)->setMethods(['doSomething'])->getMock();
        $stub->method('doSomething')->willReturn('foo');

        $this->assertEquals('foo', $stub->doSomething());
    }
}