<?php
namespace App\Services\ServiceManagement\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
* Interface EloquentRepositoryInterface
* @package App\Repositories
*/
interface BaseRepositoryInterface
{
    /***** JSON Adaptor *****/

    public function toJSON(LengthAwarePaginator|Collection|Model $rawData): array;

    /***** BREAD Functions *****/

    public function list(array $queries = [], array $relations = []): LengthAwarePaginator|Collection;

    public function show(Model $model): Model;

    public function find(int $id): ?Model;

    public function create(array $parameters): Model;

    public function update(Model $model, array $parameters): Model;

    public function destroy(Model $model): bool;
}
