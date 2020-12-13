<?php
declare(strict_types=1);

namespace Src\Ecommerce\Transaction\Application\UseCases;

use Src\Ecommerce\Transaction\Application\EcommerceTransactionResponse;
use Src\Ecommerce\Transaction\Domain\EcommerceTransactionId;
use Src\Ecommerce\Transaction\Domain\Exceptions\EcommerceTransactionNotExists;
use Src\Shared\Application\BaseUseCase;
use Src\Shared\Application\Response;
use Src\Shared\Domain\Contracts\Repository;

final class FindEcommerceTransactionUseCase extends BaseUseCase
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
        $response = $this->repository->find(new EcommerceTransactionId($id));

        $this->ensureExists($response);

        return EcommerceTransactionResponse::fromArray($response);
    }

    /**
     * @param  array|null  $data
     */
    protected function ensureExists(?array $data)
    {
        if (empty($data)){
            throw new EcommerceTransactionNotExists();
        }
    }
}