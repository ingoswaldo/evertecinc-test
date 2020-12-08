<?php
declare(strict_types=1);

final class EcommerceCustomersResponse
{

    /**
     * @var EcommerceCustomersResponse[]
     */
    private $customers;

    public function __construct(EcommerceCustomersResponse ...$customers)
    {
        $this->customers = $customers;
    }

    /**
     * @return EcommerceCustomersResponse[]
     */
    public function getCustomers(): array
    {
        return $this->customers;
    }
}