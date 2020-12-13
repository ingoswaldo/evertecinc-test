<?php
declare(strict_types=1);

namespace Src\Shared\Infrastructure;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Src\Shared\Domain\Contracts\Repository;
use Src\Shared\Domain\Entity;
use Src\Shared\Domain\EntityId;

abstract class EloquentRepository implements Repository
{

    /**
     * @var Model
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param  EntityId  $entityId
     * @return bool
     * @throws Exception
     */
    public function delete(EntityId $entityId): bool
    {
        return $this->model->query()
            ->findOrFail($entityId->getValue())
            ->delete();
    }

    /**
     * @param  EntityId  $entityId
     * @return array
     */
    public function find(EntityId $entityId): array
    {
        return $this->model->query()
            ->findOrFail($entityId->getValue())
            ->toArray();
    }

    /**
     * @param  Entity  $entity
     * @return array
     */
    public function save(Entity $entity): array
    {
        $this->model->fill($entity->toArray());
        $this->model->save();

        return $this->model->toArray();
    }

    /**
     * @return array
     */
    public function searchAll(): array
    {
        return $this->model->query()
            ->get()
            ->toArray();
    }

    /**
     * @param  string  $field
     * @param  string  $value
     * @return array
     */
    public function searchBy(string $field, string $value): array
    {
        return $this->model->query()
            ->where($field, $value)
            ->get()
            ->toArray();
    }

    /**
     * @param  EntityId  $id
     * @param  Entity    $entity
     * @return array
     */
    public function update(EntityId $id, Entity $entity): array
    {
        $model = $this->model->query()
            ->findOrFail($id->getValue());

        $model->update($entity->toArray());

        return $model->toArray();
    }
}