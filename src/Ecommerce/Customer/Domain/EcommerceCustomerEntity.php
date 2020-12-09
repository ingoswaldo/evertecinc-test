<?php
declare(strict_types = 1);

namespace Src\Ecommerce\Customer\Domain;

use Src\Ecommerce\State\Domain\EcommerceStateId;
use Src\Shared\Domain\Entity;

final class EcommerceCustomerEntity extends Entity
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
    private $password;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var EcommerceStateId
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
     * EcommerceCustomerEntity constructor.
     * @param  EcommerceStateId  $stateId
     * @param  string            $name
     * @param  string            $email
     * @param  string            $password
     * @param  string            $phone
     * @param  string            $city
     * @param  string            $address
     * @param  string            $postalCode
     */
    public function __construct(EcommerceStateId $stateId,
        string $name,
        string $email,
        string $password,
        string $phone,
        string $city,
        string $address,
        string $postalCode
    ) {
        $this->stateId = $stateId;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->city = $city;
        $this->address = $address;
        $this->postalCode = $postalCode;
    }

    /**
     * @param  array  $data
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            new EcommerceStateId($data[ 'state_id' ]),
            $data[ 'name' ],
            $data[ 'email' ],
            $data[ 'password' ],
            $data[ 'phone' ],
            $data[ 'city' ],
            $data[ 'address' ],
            $data[ 'postal_code' ]
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name'        => $this->getName(),
            'email'       => $this->getEmail(),
            'password'    => $this->getPassword(),
            'phone'       => $this->getPhone(),
            'state_id'    => $this->getStateId(),
            'city'        => $this->getCity(),
            'address'     => $this->getAddress(),
            'postal_code' => $this->getPostalCode()
        ];
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
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return EcommerceStateId
     */
    public function getStateId(): EcommerceStateId
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