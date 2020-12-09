<?php
declare(strict_types=1);

namespace Src\Ecommerce\Order\Application;

final class EcommerceOrdersResponse
{

    /**
     * @var EcommerceOrderResponse[]
     */
    private $customers;

    public function __construct(EcommerceOrderResponse ...$customers)
    {
        $this->customers = $customers;
    }

    /**
     * @return EcommerceOrdersResponse[]
     */
    public function getCustomers(): array
    {
        return $this->customers;
    }
}