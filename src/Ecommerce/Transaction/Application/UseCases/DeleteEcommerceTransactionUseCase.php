<?php
declare(strict_types=1);

namespace Src\Ecommerce\Transaction\Application\UseCases;

use Src\Ecommerce\Transaction\Application\EcommerceTransactionDeletedResponse;
use Src\Ecommerce\Transaction\Domain\EcommerceTransactionId;
use Src\Shared\Application\BaseUseCase;
use Src\Shared\Domain\Contracts\Repository;

final class DeleteEcommerceTransactionUseCase extends BaseUseCase
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
     * @return EcommerceTransactionDeletedResponse
     */
    public function execute(int $id): EcommerceTransactionDeletedResponse
    {
        $this->checkIfUserIsNotAuthorized();

        return new EcommerceTransactionDeletedResponse(
            $this->repository->delete(new EcommerceTransactionId($id))
        );
    }
}