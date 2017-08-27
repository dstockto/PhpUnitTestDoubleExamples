<?php
declare(strict_types=1);

namespace TestDouble;

class ThingDoer
{
    /** @var LoggerInterface */
    private $logger;

    /**
     * ThingDoer constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function doThing(int $whatever)
    {
        $this->logger->log($whatever . ' was the param.');
        $this->logger->log("I just did a thing: $whatever");
        $this->logger->log('Done doing a thing.');
    }
}
