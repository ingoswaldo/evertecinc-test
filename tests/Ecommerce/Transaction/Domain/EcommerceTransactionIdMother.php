<?php
declare(strict_types=1);

namespace Tests\Ecommerce\Transaction\Domain;


use Src\Ecommerce\Transaction\Domain\EcommerceTransactionId;
use Tests\Shared\Domain\MotherCreator;

final class EcommerceTransactionIdMother
{

    /**
     * @return EcommerceTransactionId
     */
    public static function random(): EcommerceTransactionId
    {
        return self::create(MotherCreator::random()->randomDigitNotNull);
    }

    /**
     * @param  int  $id
     * @return EcommerceTransactionId
     */
    public static function create(int $id): EcommerceTransactionId
    {
        return new EcommerceTransactionId($id);
    }
}