<?php
declare(strict_types=1);

namespace Src\Shared\Domain\Exceptions;


use DomainException;

class UnauthorizedException extends DomainException
{

    protected $code = 403;
}