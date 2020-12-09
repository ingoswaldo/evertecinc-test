<?php
declare(strict_types=1);

namespace Src\Ecommerce\Customer\Application\UseCases;

use Src\Ecommerce\Customer\Application\EcommerceCustomerDeletedResponse;
use Src\Ecommerce\Customer\Domain\EcommerceCustomerId;
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