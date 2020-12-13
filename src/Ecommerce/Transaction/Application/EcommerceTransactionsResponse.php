<?php
declare(strict_types=1);

namespace Src\Ecommerce\Transaction\Application;

final class EcommerceTransactionsResponse
{

    /**
     * @var EcommerceTransactionResponse[]
     */
    private $transactions;

    public function __construct(EcommerceTransactionResponse ...$customers)
    {
        $this->transactions = $customers;
    }

    /**
     * @return EcommerceTransactionResponse[]
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }
}