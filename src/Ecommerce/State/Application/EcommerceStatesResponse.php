<?php
declare(strict_types=1);

namespace Src\Ecommerce\State\Application;


final class EcommerceStatesResponse
{

    /**
     * @var EcommerceStateResponse[]
     */
    private $states;

    public function __construct(EcommerceStateResponse ...$states)
    {
        $this->states = $states;
    }

    /**
     * @return EcommerceStateResponse[]
     */
    public function getStates(): array
    {
        return $this->states;
    }
}