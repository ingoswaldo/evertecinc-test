<?php
declare(strict_types = 1);

namespace Src\Ecommerce\Order\Application\UseCases;

use Src\Ecommerce\Order\Application\EcommerceOrderResponse;
use Src\Ecommerce\Order\Domain\EcommerceOrderEntity;
use Src\Shared\Application\BaseUseCase;
use Src\Shared\Application\Response;
use Src\Shared\Domain\Contracts\Repository;

final class CreateEcommerceOrderUseCase extends BaseUseCase
{

    /**
     * @var Repository
     */
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $customerName,
        string $customerEmail,
        string $customerMobile,
        string $status,
        float $total,
        string $currency
    ): Response {
        $data = [
            'customer_name'   => $customerName,
            'customer_email'  => $customerEmail,
            'customer_mobile' => $customerMobile,
            'status'          => $status,
            'total'           => $total,
            'currency'        => $currency,
            'reference'       => uniqid('#')
        ];

        $response = $this->repository->save(EcommerceOrderEntity::fromArray($data));

        return EcommerceOrderResponse::fromArray($response);
    }
}