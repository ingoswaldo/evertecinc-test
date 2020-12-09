<?php
declare(strict_types=1);

namespace Src\Ecommerce\Transaction\Infrastructure;

use App\Models\Transaction;
use Src\Shared\Infrastructure\EloquentRepository;

final class EcommerceEloquentTransactionRepository extends EloquentRepository
{

    /**
     * EcommerceEloquentCustomerRepository constructor.
     * @param  Transaction  $model
     */
    public function __construct(Transaction $model)
    {
        parent::__construct($model);
    }
}