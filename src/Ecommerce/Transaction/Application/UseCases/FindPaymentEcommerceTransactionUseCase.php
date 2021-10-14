<?php
declare(strict_types=1);

namespace Src\Ecommerce\Transaction\Application\UseCases;


use App\Helpers\PlaceToPayHelper;
use Dnetix\Redirection\Message\RedirectInformation;
use Dnetix\Redirection\PlacetoPay;

final class FindPaymentEcommerceTransactionUseCase
{

    /**
     * @param  int  $requestId
     * @return RedirectInformation
     */
    public function execute(int $requestId): RedirectInformation
    {
        $placeToPay = new PlacetoPay(PlaceToPayHelper::getConfig());

        return $placeToPay->query($requestId);
    }
}