<?php
declare(strict_types=1);

namespace Src\Ecommerce\Order\Application;

final class EcommerceOrdersResponse
{

    /**
     * @var EcommerceOrderResponse[]
     */
    private $orders;

    public function __construct(EcommerceOrderResponse ...$customers)
    {
        $this->orders = $customers;
    }

    /**
     * @return EcommerceOrdersResponse[]
     */
    public function getOrders(): array
    {
        return $this->orders;
    }
}