<?php
declare(strict_types=1);

namespace Src\Shared\Domain;

use Src\Shared\Domain\Exceptions\IdNotFoundException;

abstract class EntityId
{
    /**
     * @var int
     */
    private $id;

    public function __construct(int $id)
    {
        $this->setId($id);
    }

    public function getValue(): int
    {
        return $this->id;
    }

    /**
     * @param  int  $id
     */
    public function setId(int $id)
    {
        if ($id < 0){
            throw new IdNotFoundException($id);
        }

        $this->id = $id;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->getValue();
    }
}