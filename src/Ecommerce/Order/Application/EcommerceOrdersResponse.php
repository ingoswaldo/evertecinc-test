<?php
declare(strict_types=1);

namespace Src\Ecommerce\Order\Application;

final class EcommerceOrdersResponse
{

    /**
     * @var EcommerceOrderResponse[]
     */
    private $orders;

    public function __construct(EcommerceOrderResponse ...$orders)
    {
        $this->orders = $orders;
    }

    /**
     * @return EcommerceOrderResponse[]
     */
    public function getOrders(): array
    {
        return $this->orders;
    }
}