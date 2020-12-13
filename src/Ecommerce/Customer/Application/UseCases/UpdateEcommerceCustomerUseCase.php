<?php
declare(strict_types=1);

namespace Src\Ecommerce\Customer\Application\UseCases;

use Src\Ecommerce\Customer\Application\EcommerceCustomerResponse;
use Src\Ecommerce\Customer\Domain\EcommerceCustomerEntity;
use Src\Ecommerce\Customer\Domain\EcommerceCustomerId;
use Src\Shared\Application\BaseUseCase;
use Src\Shared\Application\Response;
use Src\Shared\Domain\Contracts\Repository;

final class UpdateEcommerceCustomerUseCase extends BaseUseCase
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
     * @param  int     $id
     * @param  string  $name
     * @param  string  $email
     * @param  string  $password
     * @param  string  $phone
     * @param  int     $stateId
     * @param  string  $city
     * @param  string  $address
     * @param  string  $postalCode
     * @return Response
     */
    public function execute(int $id,
        string $name,
        string $email,
        string $password,
        string $phone,
        int $stateId,
        string $city,
        string $address,
        string $postalCode
    ): Response {
        $id = new EcommerceCustomerId($id);
        $data = [
            'id'          => $id->getValue(),
            'name'        => $name,
            'email'       => $email,
            'password'    => $password,
            'phone'       => $phone,
            'state_id'    => $stateId,
            'city'        => $city,
            'address'     => $address,
            'postal_code' => $postalCode
        ];

        $response = $this->repository->update($id, EcommerceCustomerEntity::fromArray($data));

        return EcommerceCustomerResponse::fromArray($response);
    }
}