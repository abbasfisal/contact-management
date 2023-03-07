<?php

namespace App\Services\ContactService\Repository;

use App\Services\ContactService\Models\Contact;
use App\Services\ContactService\Resources\ContactResource;
use App\Services\ContactService\Resources\ContactResourceCollection;
use App\Services\ServiceManagement\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class ContactServiceRepository extends BaseRepository implements ContactServiceInterface
{

    public function getModelName(): string
    {
        return Contact::class;
    }

    public function toResource(Model $model): JsonResource
    {
        return new ContactResource($model);
    }

    public function toCollection(Collection $collection): ResourceCollection
    {
        return new ContactResourceCollection($collection);
    }

    public function createAnonymous(array $data)
    {
        /** @var CustomerServiceRepository $customerRepo */
        $customerRepo = app(CustomerServiceInterface::class);
        $customer = $customerRepo->findByMobile($data['called_number']);

        if ($customer) {
            $data['customer_id'] = $customer->id;
        }

        return $this->create($data);

    }
}
