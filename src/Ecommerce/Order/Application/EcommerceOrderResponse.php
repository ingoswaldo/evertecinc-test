<?php
declare(strict_types = 1);

namespace Src\Ecommerce\Order\Application;

use Src\Shared\Application\Response;

final class EcommerceOrderResponse extends Response
{

    /**
     * @var string
     */
    private $customerName;

    /**
     * @var string
     */
    private $customerEmail;

    /**
     * @var string
     */
    private $customerMobile;

    /**
     * @var string
     */
    private $status;

    /**
     * @var float
     */
    private $total;

    /**
     * @var string
     */
    private $currency;

    /**
     * EcommerceCustomerResponse constructor.
     * @param  int     $id
     * @param  string  $customerName
     * @param  string  $customerEmail
     * @param  string  $customerMobile
     * @param  string  $status
     * @param  float   $total
     * @param  string  $currency
     * @param  string  $created_at
     * @param  string  $updated_at
     */
    public function __construct(int $id,
        string $customerName,
        string $customerEmail,
        string $customerMobile,
        string $status,
        float $total,
        string $currency,
        string $created_at,
        string $updated_at
    ) {
        parent::__construct($id, $created_at, $updated_at);

        $this->customerName = $customerName;
        $this->customerEmail = $customerEmail;
        $this->customerMobile = $customerMobile;
        $this->status = $status;
        $this->total = $total;
        $this->currency = $currency;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id'              => $this->getId(),
            'customer_name'   => $this->getCustomerName(),
            'customer_email'  => $this->getCustomerEmail(),
            'customer_mobile' => $this->getCustomerMobile(),
            'status'          => $this->getStatus(),
            'total'           => $this->getTotal(),
            'currency'        => $this->getCurrency(),
            'created_at'      => $this->getCreatedAt(),
            'updated_at'      => $this->getUpdatedAt()
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
            $data[ 'customer_name' ],
            $data[ 'customer_email' ],
            $data[ 'customer_mobile' ],
            $data[ 'status' ],
            $data[ 'total' ],
            $data[ 'currency' ],
            $data[ 'created_at' ],
            $data[ 'updated' ]
        );
    }

    /**
     * @return string
     */
    public function getCustomerName(): string
    {
        return $this->customerName;
    }

    /**
     * @return string
     */
    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    /**
     * @return string
     */
    public function getCustomerMobile(): string
    {
        return $this->customerMobile;
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
    public function getCurrency(): string
    {
        return $this->currency;
    }
}