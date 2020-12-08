<?php
declare(strict_types=1);

namespace Src\Shared\Domain\Contracts;

use Src\Shared\Domain\Entity;
use Src\Shared\Domain\EntityId;

interface Repository
{

    public function delete(EntityId $entityId): bool;

    public function find(EntityId $entityId): array;

    public function save(Entity $entity): array;

    public function searchAll(): array;

    public function searchBy(string $field, string $value): array;

    public function update(EntityId $id, Entity $entity): array;
}