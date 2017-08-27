<?php
declare(strict_types=1);

namespace TestTestDouble;

use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use TestDouble\LoggerInterface;
use TestDouble\ThingDoer;

class SpyTest extends TestCase
{
    /**
     * @test
     */
    public function prophecySpy()
    {
        $logger = $this->prophesize(LoggerInterface::class);

        $thingDoer = new ThingDoer($logger->reveal());

        $random = random_int(1, 10000);

        $thingDoer->doThing($random);

        // Assertion about only what we care about done after the fact.
        $message = 'I just did a thing: ' . $random;
        $logger->log($message)->shouldHaveBeenCalled();
    }

    /**
     * @test
     */
    public function prophecyMock()
    {
        $logger = $this->prophesize(LoggerInterface::class);

        $thingDoer = new ThingDoer($logger->reveal());

        $random = random_int(1, 10000);

        // Expectation set up before it happens - uses shouldBeCalled instead of shouldHaveBeenCalled
        $message = 'I just did a thing: ' . $random;
        $logger->log($message)->shouldBeCalled();

        // I don't care about these calls, but if we set up expectations before we make the call, we have to specify all
        // of them. If either of the next two lines are removed the test will fail. If shouldBeCalled() is not included
        // it won't worth as the expectation means nothing.
        $logger->log("$random was the param.")->shouldBeCalled();
        $logger->log('Done doing a thing.')->shouldBeCalled();

        // Alternatively, you can tell it you don't care about the other calls. With the line below, the 2 lines above
        // are not needed.
        $logger->log(Argument::any())->shouldBeCalled();

        $thingDoer->doThing($random);
    }


}
