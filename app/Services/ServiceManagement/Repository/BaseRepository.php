<?php

namespace App\Services\ServiceManagement\Repository;

use App\Services\LookupService\Resources\LookupCollection;
use App\Services\LookupService\Resources\LookupResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;


abstract class BaseRepository implements BaseRepositoryInterface
{
    /***** Model Adaptor *****/

//    public function getModelName(): string
//    {
//        return 'NoModel';
//    }
    abstract public function getModelName(): string;

    public function getModel(): Model
    {
        return app($this->getModelName());
    }

    /***** JSON Adaptor *****/

    public function toResource(Model $model): JsonResource
    {
        return new JsonResource($model);
    }

    public function toCollection(Collection $collection): ResourceCollection
    {
        return new ResourceCollection($collection);
    }

    public function toJSON(LengthAwarePaginator|Collection|Model $rawData): array
    {
        $data = [];
        $meta = [];

        if ($rawData instanceof Model) {
            $data = $this->toResource($rawData);
        }

        if ($rawData instanceof Collection) {
            $data = $this->toCollection($rawData);
        }

        if ($rawData instanceof LengthAwarePaginator) {
            $data = $this->toCollection(collect($rawData->items()));
            $meta = $rawData->toArray();
            unset($meta['data']);
        }

        return [
            'data' => $data,
            'meta' => $meta,
        ];
    }

    /***** BREAD Functions *****/

    public function applyFilters(Builder $models, array $queries = []): Builder
    {
        return $models;
    }

    public function list(array $queries = [], array $relations = []): LengthAwarePaginator|Collection
    {
        $models = $this->getModel()->query()
            ->with($relations);


        $models = $this->applyFilters($models, $queries);

        if (isset($queries['order_by'])) {
            $models = $models->orderBy('created_at', $queries['order_by']);
        } else {
            $models = $models->orderBy('created_at', 'DESC');
        }

        if (isset($queries['with_trashed'])) {
            $models = $models->withTrashed();
        }

        if (isset($queries['paginate']) && $queries['paginate'] == false)
            return $models->get();
        else
            return $models->paginate();
    }

    public function show(Model $model): Model
    {
        return $model;
    }

    public function find(int $id): ?Model
    {
        return $this->getModel()->query()->find($id);
    }

    public function create(array $parameters): Model
    {
        /** @var Model $model */
        $model = $this->getModel()->query()
            ->create($parameters);

        return $model;
    }

    public function update(Model $model, array $parameters): Model
    {
        $model->update($parameters);

        return $model->refresh();
    }

    public function destroy(Model $model): bool
    {
        return $model->delete();
    }
}
