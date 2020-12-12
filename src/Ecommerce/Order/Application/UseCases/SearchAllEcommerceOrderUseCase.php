<?php
declare(strict_types=1);


namespace Src\Ecommerce\Order\Application\UseCases;


use Src\Ecommerce\Order\Application\EcommerceOrderResponse;
use Src\Ecommerce\Order\Application\EcommerceOrdersResponse;
use Src\Shared\Domain\Contracts\Repository;

final class SearchAllEcommerceOrderUseCase
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
     * @return EcommerceOrdersResponse
     */
    public function execute(): EcommerceOrdersResponse
    {
        return new EcommerceOrdersResponse(...array_map($this->toResponse(), $this->repository->searchAll()));
    }

    private function toResponse(): callable
    {
        return function(array $data){
            return EcommerceOrderResponse::fromArray($data);
        };
    }
}