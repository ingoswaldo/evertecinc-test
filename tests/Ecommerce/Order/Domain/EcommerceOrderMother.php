<?php
declare(strict_types = 1);

namespace Tests\Ecommerce\Order\Domain;


use Src\Ecommerce\Order\Domain\EcommerceOrderEntity;
use Tests\Shared\Domain\MotherCreator;

final class EcommerceOrderMother
{

    /**
     * @return EcommerceOrderEntity
     */
    public static function random(): EcommerceOrderEntity
    {
        $data = [
            'customer_name'   => MotherCreator::random()->name,
            'customer_email'  => MotherCreator::random()->email,
            'customer_mobile' => MotherCreator::random()->phoneNumber,
            'status'          => MotherCreator::random()->randomElement(['CREATED', 'PAYED', 'REJECTED']),
            'total'           => MotherCreator::random()->randomFloat(2, 0, 1000),
            'currency'        => MotherCreator::random()->currencyCode
        ];

        return EcommerceOrderEntity::fromArray($data);
    }

    public static function fromArray($data): EcommerceOrderEntity
    {
        return EcommerceOrderEntity::fromArray($data);
    }
}