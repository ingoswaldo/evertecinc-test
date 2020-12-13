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
     * @param  string  $customerName
     * @param  string  $customerEmail
     * @param  string  $customerMobile
     * @param  string  $status
     * @param  float   $total
     * @param  string  $currency
     * @param  string  $reference
     * @return Response
     */
    public function execute(int $id,
        string $customerName,
        string $customerEmail,
        string $customerMobile,
        string $status,
        float $total,
        string $currency,
        string $reference
    ): Response {
        $id = new EcommerceOrderId($id);
        $data = [
            'customer_name'   => $customerName,
            'customer_email'  => $customerEmail,
            'customer_mobile' => $customerMobile,
            'status'          => $status,
            'total'           => $total,
            'currency'        => $currency,
            'reference'       => $reference
        ];

        $response = $this->repository->update($id, EcommerceOrderEntity::fromArray($data));

        return EcommerceOrderResponse::fromArray($response);
    }
}