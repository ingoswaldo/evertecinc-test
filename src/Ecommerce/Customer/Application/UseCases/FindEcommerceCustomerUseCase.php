<?php
declare(strict_types=1);

namespace Src\Ecommerce\Customer\Application\UseCases;

use Src\Ecommerce\Customer\Application\EcommerceCustomerResponse;
use Src\Ecommerce\Customer\Domain\EcommerceCustomerId;
use Src\Ecommerce\Customer\Domain\Exceptions\EcommerceCustomerNotExists;
use Src\Shared\Application\BaseUseCase;
use Src\Shared\Application\Response;
use Src\Shared\Domain\Contracts\Repository;

final class FindEcommerceCustomerUseCase extends BaseUseCase
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
     * @param  int  $id
     * @return Response
     */
    public function execute(int $id): Response
    {
        $response = $this->repository->find(new EcommerceCustomerId($id));

        $this->ensureExists($response);

        return EcommerceCustomerResponse::fromArray($response);
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