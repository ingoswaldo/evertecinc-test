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
     * @param  string  $reference
     * @param  string  $description
     * @param  float   $total
     * @param  string  $currency
     * @param  string  $expirationDate
     * @param  string  $returnUrl
     * @return RedirectResponse
     * @throws PlacetoPayException
     */
    public function execute(
        string $reference,
        string $description,
        float $total,
        string $currency,
        string $expirationDate,
        string $returnUrl
    ): RedirectResponse {
        $placeToPay = new PlacetoPay(PlaceToPayHelper::getConfig());
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