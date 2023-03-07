<?php

namespace App\Services\ContactService\Repository;

use App\Services\ContactService\Models\Customer;
use App\Services\ContactService\Resources\CustomerCollection;
use App\Services\ContactService\Resources\CustomerResource;
use App\Services\ServiceManagement\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class CustomerServiceRepository extends BaseRepository implements CustomerServiceInterface
{

    public function getModelName(): string
    {
        return Customer::class;
    }

    public function toResource(Model $model): JsonResource
    {
        return new CustomerResource($model);
    }

    public function toCollection(Collection $collection): ResourceCollection
    {
        return new CustomerCollection($collection);
    }

    public function findByMobile($mobile): ?Model
    {
        return $this->getModel()->newQuery()->where('mobile', $mobile)->first();
    }
}
