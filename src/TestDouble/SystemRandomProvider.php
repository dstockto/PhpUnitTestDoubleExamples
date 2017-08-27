<?php
declare(strict_types=1);

namespace TestDouble;

class SystemRandomProvider implements RandomProvider
{
    public function getRandom(int $lo, int $hi): int
    {
        return random_int($lo, $hi);
    }
}
