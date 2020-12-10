<?php
declare(strict_types = 1);

namespace Src\Ecommerce\Transaction\Application;

use Src\Shared\Application\Response;

final class EcommerceTransactionResponse extends Response
{

    /**
     * @var int
     */
    private $orderId;

    /**
     * @var float
     */
    private $subtotal;

    /**
     * @var float
     */
    private $transactionCost;

    /**
     * @var float
     */
    private $total;

    /**
     * @var string
     */
    private $expirationDate;

    /**
     * @var string
     */
    private $ipAddress;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $requestId;

    /**
     * @var string
     */
    private $requestUrl;

    /**
     * EcommerceCustomerResponse constructor.
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
     * @param  string       $created_at
     * @param  string       $updated_at
     */
    public function __construct(int $id,
        int $orderId,
        float $subtotal,
        float $transactionCost,
        float $total,
        string $expirationDate,
        string $ipAddress,
        string $status,
        ?string $requestId,
        ?string $requestUrl,
        string $created_at,
        string $updated_at
    ) {
        parent::__construct($id, $created_at, $updated_at);

        $this->orderId = $orderId;
        $this->subtotal = $subtotal;
        $this->transactionCost = $transactionCost;
        $this->total = $total;
        $this->expirationDate = $expirationDate;
        $this->ipAddress = $ipAddress;
        $this->status = $status;
        $this->requestId = $requestId;
        $this->requestUrl = $requestUrl;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id'               => $this->getId(),
            'order_id'         => $this->getOrderId(),
            'subtotal'         => $this->getSubtotal(),
            'transaction_cost' => $this->getTransactionCost(),
            'total'            => $this->getTotal(),
            'expiration_date'  => $this->getExpirationDate(),
            'ip_address'       => $this->getIpAddress(),
            'status'           => $this->getStatus(),
            'request_id'       => $this->getRequestId(),
            'request_url'      => $this->getRequestUrl(),
            'created_at'       => $this->getCreatedAt(),
            'updated_at'       => $this->getUpdatedAt()
        ];
    }

    /**
     * @param  array  $data
     * @return Response
     */
    public static function fromArray(array $data): Response
    {
        return new self(
            $data[ 'id' ],
            $data[ 'order_id' ],
            $data[ 'subtotal' ],
            $data[ 'transaction_cost' ],
            $data[ 'total' ],
            $data[ 'expiration_date' ],
            $data[ 'ip_address' ],
            $data[ 'status' ],
            $data[ 'request_id' ],
            $data[ 'request_url' ],
            $data[ 'created_at' ],
            $data[ 'updated_at' ]
        );
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @return float
     */
    public function getSubtotal(): float
    {
        return $this->subtotal;
    }

    /**
     * @return float
     */
    public function getTransactionCost(): float
    {
        return $this->transactionCost;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @return string
     */
    public function getExpirationDate(): string
    {
        return $this->expirationDate;
    }

    /**
     * @return string
     */
    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    /**
     * @return string
     */
    public function getRequestId(): ?string
    {
        return $this->requestId;
    }

    /**
     * @return string
     */
    public function getRequestUrl(): ?string
    {
        return $this->requestUrl;
    }
}