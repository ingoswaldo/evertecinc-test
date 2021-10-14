<?php
declare(strict_types = 1);


namespace App\Helpers;


final class PlaceToPayHelper
{

    /**
     * @return array
     */
    public static function getConfig(): array
    {
        return config('gateway.place_to_pay');
    }

    /**
     * @param  string  $reference
     * @param  string  $description
     * @param  float   $total
     * @param  string  $currency
     * @param  string  $expirationDate
     * @param  string  $returnUrl
     * @return array
     */
    public static function getRequest(string $reference,
        string $description,
        float $total,
        string $currency,
        string $expirationDate,
        string $returnUrl
    ): array {
        $ip = request()->ip();
        $userAgent = request()->userAgent();

        return [
            'payment'    => [
                'reference'   => $reference,
                'description' => $description,
                'amount'      => [
                    'currency' => $currency,
                    'total'    => $total,
                ],
            ],
            'expiration' => $expirationDate,
            'returnUrl'  => $returnUrl,
            'ipAddress'  => $ip,
            'userAgent'  => $userAgent,
        ];
    }
}