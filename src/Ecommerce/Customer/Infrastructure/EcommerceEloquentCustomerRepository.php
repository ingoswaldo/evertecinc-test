<?php
declare(strict_types=1);

namespace Src\Ecommerce\Customer\Infrastructure;

use App\Models\User;
use Src\Shared\Infrastructure\EloquentRepository;

final class EcommerceEloquentCustomerRepository extends EloquentRepository
{

    /**
     * EcommerceEloquentCustomerRepository constructor.
     * @param  User  $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}