<?php
declare(strict_types=1);

namespace Src\Shared\Application;


use Src\Shared\Domain\Exceptions\UnauthorizedException;

abstract class BaseUseCase
{

    /**
     * @var bool
     */
    protected $isAuthorized = false;

    public function setAuthorized(bool $bool)
    {
        $this->isAuthorized = $bool;
    }

    protected function checkIfUserIsNotAuthorized()
    {
        if ($this->isAuthorized === false){
            throw new UnauthorizedException();
        }
    }
}