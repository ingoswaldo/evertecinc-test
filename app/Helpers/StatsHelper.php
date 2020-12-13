<?php
declare(strict_types=1);

namespace App\Helpers;


final class StatsHelper
{

    /**
     * @param  float  $price
     * @param  int    $quantity
     * @return float
     */
    public static function getTotalPrice(float $price, int $quantity): float
    {
        return $price * $quantity;
    }
}