<?php
declare(strict_types=1);

namespace Src\Ecommerce\Order\Application\UseCases;

use Src\Ecommerce\Order\Application\EcommerceOrderDeletedResponse;
use Src\Ecommerce\Order\Domain\EcommerceOrderId;
use Src\Shared\Application\BaseUseCase;
use Src\Shared\Domain\Contracts\Repository;

final class DeleteEcommerceOrderUseCase extends BaseUseCase
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
     * @return EcommerceOrderDeletedResponse
     */
    public function execute(int $id): EcommerceOrderDeletedResponse
    {
        $this->checkIfUserIsNotAuthorized();

        return new EcommerceOrderDeletedResponse(
            $this->repository->delete(new EcommerceOrderId($id))
        );
    }
}