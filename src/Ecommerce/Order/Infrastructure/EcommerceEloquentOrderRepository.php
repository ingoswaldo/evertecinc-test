<?php
declare(strict_types=1);

namespace Src\Ecommerce\Order\Infrastructure;

use App\Models\Order;
use Src\Shared\Infrastructure\EloquentRepository;

final class EcommerceEloquentOrderRepository extends EloquentRepository
{

    /**
     * EcommerceEloquentCustomerRepository constructor.
     * @param  Order  $model
     */
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }
}