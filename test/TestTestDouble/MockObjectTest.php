<?php
declare(strict_types=1);

namespace TestTestDouble;

use PHPUnit\Framework\TestCase;
use TestDouble\DiceRoller;
use TestDouble\RandomProvider;

class MockObjectTest extends TestCase
{
    /**
     * @test
     */
    public function createMockMockObject()
    {
        $mock = $this->createMock(RandomProvider::class);
        $mock->method('getRandom')->with(1, 6)->willReturn(4);

        $diceRoller = new DiceRoller($mock);
        $this->assertEquals(4, $diceRoller->roll());
    }

    /**
     * @test
     */
    public function mockBuilderMockObject()
    {
        $mock = $this->getMockBuilder(RandomProvider::class)->setMethods(['getRandom'])->getMock();
        $mock->method('getRandom')->with(1, 6)->willReturn(4);

        $diceRoller = new DiceRoller($mock);
        $this->assertEquals(4, $diceRoller->roll());
    }

    /**
     * @test
     */
    public function prophecyMockObject()
    {
        $mockProphecy = $this->prophesize(RandomProvider::class);
        $mockProphecy->getRandom(1, 6)->willReturn(4);

        $diceRoller = new DiceRoller($mockProphecy->reveal());
        $this->assertEquals(4, $diceRoller->roll());
    }
}
