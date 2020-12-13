<?php
declare(strict_types=1);


namespace App\Helpers;


final class PlaceToPayHelper
{

    /**
     * @param  string  $login
     * @param  string  $tranKey
     * @param  string  $url
     * @param  int     $timeOut
     * @param  int     $connectTimeOut
     * @return array
     */
    public static function getConfig(string $login, string $tranKey, string $url, int $timeOut, int $connectTimeOut): array
    {
        return [
            'login'   => $login,
            'tranKey' => $tranKey,
            'url'     => $url,
            'rest'    => [
                'timeout'         => $timeOut,
                'connect_timeout' => $connectTimeOut
            ]
        ];
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
        return [
            'payment' => [
                'reference'   => $reference,
                'description' => $description,
                'amount'      => [
                    'currency' => $currency,
                    'total'    => $total,
                ],
            ],
            'expiration' => $expirationDate,
            'returnUrl'  => $returnUrl,
        ];
    }
}