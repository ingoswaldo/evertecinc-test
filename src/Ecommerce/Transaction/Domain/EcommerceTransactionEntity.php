<?php
declare(strict_types = 1);

namespace Src\Ecommerce\Transaction\Domain;

use Src\Ecommerce\Order\Domain\EcommerceOrderId;
use Src\Shared\Domain\Entity;

final class EcommerceTransactionEntity extends Entity
{

    /**
     * @var EcommerceOrderId
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
     * EcommerceCustomerEntity constructor.
     * @param  EcommerceOrderId  $orderId
     * @param  float             $subtotal
     * @param  float             $transactionCost
     * @param  float             $total
     * @param  string            $expirationDate
     * @param  string            $ipAddress
     * @param  string            $status
     * @param  string|null       $requestId
     * @param  string|null       $requestUrl
     */
    public function __construct(EcommerceOrderId $orderId,
        float $subtotal,
        float $transactionCost,
        float $total,
        string $expirationDate,
        string $ipAddress,
        string $status,
        ?string $requestId = null,
        ?string $requestUrl = null
    ) {
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
     * @param  array  $data
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            new EcommerceOrderId($data[ 'order_id' ]),
            $data[ 'subtotal' ],
            $data[ 'transaction_cost' ],
            $data[ 'total' ],
            $data[ 'expiration_date' ],
            $data[ 'ip_address' ],
            $data[ 'status' ],
            $data[ 'request_id' ],
            $data[ 'request_url' ]
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'order_id'         => $this->getOrderId(),
            'subtotal'         => $this->getSubtotal(),
            'transaction_cost' => $this->getTransactionCost(),
            'total'            => $this->getTotal(),
            'expiration_date'  => $this->getExpirationDate(),
            'ip_address'       => $this->getIpAddress(),
            'status'           => $this->getStatus(),
            'request_id'       => $this->getRequestId(),
            'request_url'      => $this->getRequestUrl(),
        ];
    }

    /**
     * @return EcommerceOrderId
     */
    public function getOrderId(): EcommerceOrderId
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
    public function getStatus(): string
    {
        return $this->status;
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