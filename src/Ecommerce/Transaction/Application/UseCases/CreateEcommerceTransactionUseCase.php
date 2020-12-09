<?php
declare(strict_types = 1);

namespace Src\Ecommerce\Transaction\Application\UseCases;

use Src\Ecommerce\Transaction\Application\EcommerceTransactionResponse;
use Src\Ecommerce\Transaction\Domain\EcommerceTransactionEntity;
use Src\Shared\Application\BaseUseCase;
use Src\Shared\Application\Response;
use Src\Shared\Domain\Contracts\Repository;

final class CreateEcommerceTransactionUseCase extends BaseUseCase
{

    /**
     * @var Repository
     */
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $orderId,
        float $subtotal,
        float $transactionCost,
        float $total,
        string $expirationDate,
        string $ipAddress,
        string $status,
        ?string $requestId = null,
        ?string $requestUrl = null
    ): Response {
        $data = [
            'order_id'         => $orderId,
            'subtotal'         => $subtotal,
            'transaction_cost' => $transactionCost,
            'total'            => $total,
            'expiration_date'  => $expirationDate,
            'ip_address'       => $ipAddress,
            'status'           => $status,
            'request_id'       => $requestId,
            'request_url'      => $requestUrl,
        ];

        $response = $this->repository->save(EcommerceTransactionEntity::fromArray($data));

        return EcommerceTransactionResponse::fromArray($response);
    }
}