<?php
declare(strict_types=1);

namespace Tests\Ecommerce\Customer\Domain;


use Src\Ecommerce\Customer\Domain\EcommerceCustomerEntity;
use Tests\Shared\Domain\MotherCreator;

final class EcommerceCustomerMother
{

    /**
     * @return EcommerceCustomerEntity
     */
    public static function random(): EcommerceCustomerEntity
    {
        $data = [
            'name'        => MotherCreator::random()->name,
            'email'       => MotherCreator::random()->email,
            'password'    => MotherCreator::random()->password,
            'phone'       => MotherCreator::random()->phoneNumber,
            'state_id'    => MotherCreator::random()->randomDigitNotNull,
            'city'        => MotherCreator::random()->city,
            'address'     => MotherCreator::random()->address,
            'postal_code' => MotherCreator::random()->postcode,
        ];

        return EcommerceCustomerEntity::fromArray($data);
    }

    public static function fromArray($data): EcommerceCustomerEntity
    {
        return EcommerceCustomerEntity::fromArray($data);
    }
}