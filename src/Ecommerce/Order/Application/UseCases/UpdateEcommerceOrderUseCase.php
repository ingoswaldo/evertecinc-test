<?php
declare(strict_types=1);

namespace Src\Ecommerce\Order\Application\UseCases;

use Src\Ecommerce\Order\Application\EcommerceOrderResponse;
use Src\Ecommerce\Order\Domain\EcommerceOrderEntity;
use Src\Ecommerce\Order\Domain\EcommerceOrderId;
use Src\Shared\Application\BaseUseCase;
use Src\Shared\Application\Response;
use Src\Shared\Domain\Contracts\Repository;

final class UpdateEcommerceOrderUseCase extends BaseUseCase
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
        $id = new EcommerceOrderId($id);
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

        $response = $this->repository->update($id, EcommerceOrderEntity::fromArray($data));

        return EcommerceOrderResponse::fromArray($response);
    }
}