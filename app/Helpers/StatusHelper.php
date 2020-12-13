<?php
declare(strict_types=1);

namespace App\Helpers;


final class StatusHelper
{

    public static function translate(string $status)
    {
        if (self::isPayed($status)){
            return 'Pagada';
        }

        if (self::isRejeceted($status)){
            return 'Rechazada';
        }

        return 'Creada';
    }

    private static function isPayed(string $status)
    {
        return $status === 'PAYED';
    }

    private static function isRejeceted(string $status)
    {
        return $status === 'REJECTED';
    }
}