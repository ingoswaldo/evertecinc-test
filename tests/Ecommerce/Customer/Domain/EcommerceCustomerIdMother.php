<?php
declare(strict_types=1);

namespace Tests\Ecommerce\Customer\Domain;


use Src\Ecommerce\Customer\Domain\EcommerceCustomerId;
use Tests\Shared\Domain\MotherCreator;

final class EcommerceCustomerIdMother
{

    /**
     * @return EcommerceCustomerId
     */
    public static function random(): EcommerceCustomerId
    {
        return self::create(MotherCreator::random()->randomDigitNotNull);
    }

    /**
     * @param  int  $id
     * @return EcommerceCustomerId
     */
    public static function create(int $id): EcommerceCustomerId
    {
        return new EcommerceCustomerId($id);
    }
}