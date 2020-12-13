<?php
declare(strict_types=1);

namespace Src\Ecommerce\Order\Application\UseCases;

use Src\Ecommerce\Customer\Application\EcommerceCustomerResponse;
use Src\Ecommerce\Order\Domain\EcommerceOrderId;
use Src\Ecommerce\Order\Domain\Exceptions\EcommerceOrderNotExists;
use Src\Shared\Application\BaseUseCase;
use Src\Shared\Application\Response;
use Src\Shared\Domain\Contracts\Repository;

final class FindEcommerceOrderUseCase extends BaseUseCase
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
        $response = $this->repository->find(new EcommerceOrderId($id));

        $this->ensureExists($response);

        return EcommerceCustomerResponse::fromArray($response);
    }

    /**
     * @param  array|null  $data
     */
    protected function ensureExists(?array $data)
    {
        if (empty($data)){
            throw new EcommerceOrderNotExists();
        }
    }
}