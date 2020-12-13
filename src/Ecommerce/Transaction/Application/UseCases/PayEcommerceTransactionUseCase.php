<?php
declare(strict_types = 1);

namespace Src\Ecommerce\Transaction\Application\UseCases;


use App\Helpers\PlaceToPayHelper;
use Dnetix\Redirection\Exceptions\PlacetoPayException;
use Dnetix\Redirection\Message\RedirectResponse;
use Dnetix\Redirection\PlacetoPay;

final class PayEcommerceTransactionUseCase
{

    /**
     * @param  string  $login
     * @param  string  $tranKey
     * @param  string  $url
     * @param  int     $timeOut
     * @param  int     $connectTimeOut
     * @param  string  $reference
     * @param  string  $description
     * @param  float   $total
     * @param  string  $currency
     * @param  string  $expirationDate
     * @param  string  $returnUrl
     * @return RedirectResponse
     * @throws PlacetoPayException
     */
    public function execute(string $login,
        string $tranKey,
        string $url,
        int $timeOut,
        int $connectTimeOut,
        string $reference,
        string $description,
        float $total,
        string $currency,
        string $expirationDate,
        string $returnUrl
    ): RedirectResponse {
        $placeToPay = new PlacetoPay(PlaceToPayHelper::getConfig($login, $tranKey, $url, $timeOut, $connectTimeOut));
        return $placeToPay->request(PlaceToPayHelper::getRequest(
            $reference,
            $description,
            $total,
            $currency,
            $expirationDate,
            $returnUrl
        ));
    }
}