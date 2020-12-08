<?php
declare(strict_types=1);

namespace Src\Shared\Application;


abstract class Response
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $created_at;

    /**
     * @var string
     */
    private $updated_at;

    public function __construct(int $id, string $created_at, string $updated_at)
    {

        $this->id = $id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * @return array
     */
    public function __toArray(): array
    {
        return $this->toArray();
    }

    public abstract function toArray(): array;

    public static abstract function fromArray(array $data): self;
}