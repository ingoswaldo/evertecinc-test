<?php
declare(strict_types=1);

namespace Src\Ecommerce\State\Application\UseCases;


use Src\Ecommerce\State\Application\EcommerceStateResponse;
use Src\Ecommerce\State\Application\EcommerceStatesResponse;
use Src\Shared\Domain\Contracts\Repository;

final class SearchEcommerceStateUseCase
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
     * @return EcommerceStatesResponse
     */
    public function execute(string $field, string $value): EcommerceStatesResponse
    {
        $states = $this->repository->searchBy($field, $value);

        return new EcommerceStatesResponse(...array_map($this->toResponse(), $states));
    }

    private function toResponse(): callable
    {
        return function(array $data){
            return EcommerceStateResponse::fromArray($data);
        };
    }
}