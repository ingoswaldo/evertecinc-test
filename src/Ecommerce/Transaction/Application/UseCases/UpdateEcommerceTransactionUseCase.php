<?php
declare(strict_types=1);

namespace Src\Ecommerce\Transaction\Application\UseCases;

use Src\Ecommerce\Transaction\Application\EcommerceTransactionResponse;
use Src\Ecommerce\Transaction\Domain\EcommerceTransactionEntity;
use Src\Ecommerce\Transaction\Domain\EcommerceTransactionId;
use Src\Shared\Application\BaseUseCase;
use Src\Shared\Application\Response;
use Src\Shared\Domain\Contracts\Repository;

final class UpdateEcommerceTransactionUseCase extends BaseUseCase
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
     * @param  int          $id
     * @param  int          $orderId
     * @param  float        $subtotal
     * @param  float        $transactionCost
     * @param  float        $total
     * @param  string       $expirationDate
     * @param  string       $ipAddress
     * @param  string       $status
     * @param  string|null  $requestId
     * @param  string|null  $requestUrl
     * @return Response
     */
    public function execute(int $id,
        int $orderId,
        float $subtotal,
        float $transactionCost,
        float $total,
        string $expirationDate,
        string $ipAddress,
        string $status,
        ?string $requestId = null,
        ?string $requestUrl = null
    ): Response {
        $id = new EcommerceTransactionId($id);
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

        $response = $this->repository->update($id, EcommerceTransactionEntity::fromArray($data));

        return EcommerceTransactionResponse::fromArray($response);
    }
}