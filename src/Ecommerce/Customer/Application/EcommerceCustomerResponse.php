<?php
declare(strict_types = 1);

namespace Src\Ecommerce\Customer\Application;

use Src\Shared\Application\Response;

final class EcommerceCustomerResponse extends Response
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var int
     */
    private $stateId;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $postalCode;

    /**
     * EcommerceCustomerResponse constructor.
     * @param  int     $id
     * @param  string  $name
     * @param  string  $email
     * @param  string  $phone
     * @param  int     $stateId
     * @param  string  $city
     * @param  string  $address
     * @param  string  $postalCode
     * @param  string  $created_at
     * @param  string  $updated_at
     */
    public function __construct(int $id,
        string $name,
        string $email,
        string $phone,
        int $stateId,
        string $city,
        string $address,
        string $postalCode,
        string $created_at,
        string $updated_at
    ) {
        parent::__construct($id, $created_at, $updated_at);

        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->stateId = $stateId;
        $this->city = $city;
        $this->address = $address;
        $this->postalCode = $postalCode;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id'          => $this->getId(),
            'name'        => $this->getName(),
            'email'       => $this->getEmail(),
            'phone'       => $this->getPhone(),
            'state_id'    => $this->getStateId(),
            'city'        => $this->getCity(),
            'address'     => $this->getAddress(),
            'postal_code' => $this->getPostalCode(),
            'created_at'  => $this->getCreatedAt(),
            'updated_at'  => $this->getUpdatedAt()
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
            $data[ 'name' ],
            $data[ 'email' ],
            $data[ 'phone' ],
            $data[ 'state_id' ],
            $data[ 'city' ],
            $data[ 'address' ] ?? '',
            $data[ 'postal_code' ] ?? '',
            $data[ 'created_at' ],
            $data[ 'updated_at' ]
        );
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return int
     */
    public function getStateId(): int
    {
        return $this->stateId;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }
}