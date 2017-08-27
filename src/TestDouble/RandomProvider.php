<?php
declare(strict_types=1);

namespace TestDouble;

interface RandomProvider
{
    public function getRandom(int $lo, int $hi): int;
}
