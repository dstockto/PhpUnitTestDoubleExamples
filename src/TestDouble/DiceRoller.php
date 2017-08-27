<?php
declare(strict_types=1);

namespace TestDouble;

class DiceRoller
{
    /** @var RandomProvider */
    private $randomProvider;

    /**
     * DiceRoller constructor.
     * @param $randomProvider
     */
    public function __construct(RandomProvider $randomProvider)
    {
        $this->randomProvider = $randomProvider;
    }

    public function roll()
    {
        return $this->randomProvider->getRandom(1, 6);
    }
}