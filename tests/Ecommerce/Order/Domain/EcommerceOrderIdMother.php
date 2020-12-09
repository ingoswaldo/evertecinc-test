<?php
declare(strict_types=1);

namespace Tests\Ecommerce\Order\Domain;


use Src\Ecommerce\Order\Domain\EcommerceOrderId;
use Tests\Shared\Domain\MotherCreator;

final class EcommerceOrderIdMother
{

    /**
     * @return EcommerceOrderId
     */
    public static function random(): EcommerceOrderId
    {
        return self::create(MotherCreator::random()->randomDigitNotNull);
    }

    /**
     * @param  int  $id
     * @return EcommerceOrderId
     */
    public static function create(int $id): EcommerceOrderId
    {
        return new EcommerceOrderId($id);
    }
}