<?php
declare(strict_types = 1);

namespace Tests\Ecommerce\Transaction\Domain;


use Src\Ecommerce\Transaction\Domain\EcommerceTransactionEntity;
use Tests\Shared\Domain\MotherCreator;

final class EcommerceTransactionMother
{

    /**
     * @return EcommerceTransactionEntity
     */
    public static function random(): EcommerceTransactionEntity
    {
        $data = [
            'order_id'         => MotherCreator::random()->randomDigitNotNull,
            'subtotal'         => MotherCreator::random()->randomFloat(2, 0, 1000),
            'transaction_cost' => MotherCreator::random()->randomFloat(2, 0, 1000),
            'total'            => MotherCreator::random()->randomFloat(2, 0, 1000),
            'expiration_date'  => MotherCreator::random()->dateTime->format('Y-m-d H:i'),
            'ip_address'       => MotherCreator::random()->ipv4,
            'status'           => MotherCreator::random()->word,
            'request_id'       => MotherCreator::random()->domainName,
            'request_url'      => MotherCreator::random()->url,
        ];

        return EcommerceTransactionEntity::fromArray($data);
    }

    public static function fromArray($data): EcommerceTransactionEntity
    {
        return EcommerceTransactionEntity::fromArray($data);
    }
}