<?php
declare(strict_types = 1);

use Src\Shared\Application\BaseUseCase;
use Src\Shared\Application\Response;
use Src\Shared\Domain\Contracts\Repository;

final class CreateEcommerceCustomerUseCase extends BaseUseCase
{

    /**
     * @var Repository
     */
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $name,
        string $email,
        string $password,
        string $phone,
        int $stateId,
        string $city,
        string $address,
        ?string $postalCode
    ): Response {
        $data = [
            'name'        => $name,
            'email'       => $email,
            'password'    => $password,
            'phone'       => $phone,
            'state_id'    => $stateId,
            'city'        => $city,
            'address'     => $address,
            'postal_code' => $postalCode,
        ];

        $response = $this->repository->save(EcommerceCustomerEntity::fromArray($data));

        return EcommerceCustomerResponse::fromArray($response);
    }
}