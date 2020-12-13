<?php
declare(strict_types=1);

namespace Src\Ecommerce\Customer\Application\UseCases;


use Src\Ecommerce\Customer\Application\EcommerceCustomerResponse;
use Src\Ecommerce\Customer\Domain\Exceptions\EcommerceCustomerNotExists;
use Src\Shared\Application\Response;
use Src\Shared\Domain\Contracts\Repository;

final class FindByEmailEcommerceCustomerUseCase
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
     * @return Response
     */
    public function execute(string $field, string $value): Response
    {
        $response = $this->repository->searchBy($field, $value);
        $first = collect($response)->first();

        $this->ensureExists($first);

        return EcommerceCustomerResponse::fromArray($first);
    }

    /**
     * @param  array|null  $data
     */
    protected function ensureExists(?array $data)
    {
        if (empty($data)){
            throw new EcommerceCustomerNotExists();
        }
    }
}