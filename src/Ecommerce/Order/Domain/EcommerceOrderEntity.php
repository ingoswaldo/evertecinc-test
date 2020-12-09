<?php
declare(strict_types = 1);

namespace Src\Ecommerce\Order\Domain;

use Src\Shared\Domain\Entity;

final class EcommerceOrderEntity extends Entity
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
     * EcommerceCustomerEntity constructor.
     * @param  string  $customerName
     * @param  string  $customerEmail
     * @param  string  $customerMobile
     * @param  string  $status
     * @param  float   $total
     * @param  string  $currency
     */
    public function __construct(string $customerName,
        string $customerEmail,
        string $customerMobile,
        string $status,
        float $total,
        string $currency
    ) {
        $this->customerName = $customerName;
        $this->customerEmail = $customerEmail;
        $this->customerMobile = $customerMobile;
        $this->status = $status;
        $this->total = $total;
        $this->currency = $currency;
    }

    /**
     * @param  array  $data
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data[ 'customer_name' ],
            $data[ 'customer_email' ],
            $data[ 'customer_mobile' ],
            $data[ 'status' ],
            $data[ 'total' ],
            $data[ 'currency' ]
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'customer_name'   => $this->getCustomerName(),
            'customer_email'  => $this->getCustomerEmail(),
            'customer_mobile' => $this->getCustomerMobile(),
            'status'          => $this->getStatus(),
            'total'           => $this->getTotal(),
            'currency'        => $this->getCurrency()
        ];
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