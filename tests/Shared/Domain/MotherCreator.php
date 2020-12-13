<?php
declare(strict_types=1);

namespace Tests\Shared\Domain;


use Faker\Factory;
use Faker\Generator;

final class MotherCreator
{

    /**
     * @return Generator
     */
    public static function random(): Generator
    {
        return Factory::create();
    }
}