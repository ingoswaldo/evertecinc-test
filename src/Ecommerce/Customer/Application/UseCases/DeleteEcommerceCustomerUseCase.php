<?php
declare(strict_types=1);

use Src\Shared\Application\BaseUseCase;
use Src\Shared\Domain\Contracts\Repository;

final class DeleteEcommerceCustomerUseCase extends BaseUseCase
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
     * @return EcommerceCustomerDeletedResponse
     */
    public function execute(int $id): EcommerceCustomerDeletedResponse
    {
        $this->checkIfUserIsNotAuthorized();

        return new EcommerceCustomerDeletedResponse(
            $this->repository->delete(new EcommerceCustomerId($id))
        );
    }
}