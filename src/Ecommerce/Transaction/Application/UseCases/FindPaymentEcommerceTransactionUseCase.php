<?php
declare(strict_types=1);

namespace Src\Ecommerce\Transaction\Application\UseCases;


use App\Helpers\PlaceToPayHelper;
use Dnetix\Redirection\Exceptions\PlacetoPayException;
use Dnetix\Redirection\Message\RedirectInformation;
use Dnetix\Redirection\PlacetoPay;

final class FindPaymentEcommerceTransactionUseCase
{

    /**
     * @param  string  $requestId
     * @return RedirectInformation
     * @throws PlacetoPayException
     */
    public function execute(string $requestId): RedirectInformation
    {
        $placeToPay = new PlacetoPay(PlaceToPayHelper::getConfig(
            config('gateway.place_to_pay.login'),
            config('gateway.place_to_pay.tran_key'),
            config('gateway.place_to_pay.url'),
            (int) config('gateway.place_to_pay.rest.timeout'),
            (int) config('gateway.place_to_pay.rest.connect_timeout')
        ));

        return $placeToPay->query($requestId);
    }
}