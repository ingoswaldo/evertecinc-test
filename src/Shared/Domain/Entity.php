<?php
declare(strict_types=1);

namespace Src\Shared\Domain;

abstract class Entity
{

    /**
     * @var EntityId
     */
    public $id;

    public function getId(): EntityId
    {
        return $this->id;
    }

    public static abstract function fromArray(array $data);

    public abstract function toArray(): array;
}