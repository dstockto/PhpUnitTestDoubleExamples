<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: dstockton
 * Date: 8/26/17
 * Time: 10:28 PM
 */

namespace TestDouble;


class RealLogger implements LoggerInterface
{

    public function log(string $message)
    {
        // Just kidding, we're not doing anything.
    }
}