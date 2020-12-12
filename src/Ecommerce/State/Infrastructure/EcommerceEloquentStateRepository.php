<?php
declare(strict_types=1);

namespace Src\Ecommerce\State\Infrastructure;


use App\Models\State;
use Src\Shared\Infrastructure\EloquentRepository;

final class EcommerceEloquentStateRepository extends EloquentRepository
{

    /**
     * EcommerceEloquentCustomerRepository constructor.
     * @param  State  $model
     */
    public function __construct(State $model)
    {
        parent::__construct($model);
    }
}