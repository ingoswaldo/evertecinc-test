<?php
declare(strict_types=1);

namespace Src\Ecommerce\Order\Application\UseCases;


use Src\Ecommerce\Order\Application\EcommerceOrderResponse;
use Src\Ecommerce\Order\Application\EcommerceOrdersResponse;
use Src\Shared\Application\BaseUseCase;
use Src\Shared\Domain\Contracts\Repository;

final class SearchEcommerceOrderUseCase extends BaseUseCase
{

    /**
     * @var Repository
     */
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param  string  $field
     * @param  string  $value
     * @return EcommerceOrdersResponse
     */
    public function execute(string $field, string $value): EcommerceOrdersResponse
    {
        $orders = $this->repository->searchBy($field, $value);

        return new EcommerceOrdersResponse(...array_map($this->toResponse(), $orders));
    }

    private function toResponse(): callable
    {
        return function(array $data){
            return EcommerceOrderResponse::fromArray($data);
        };
    }
}