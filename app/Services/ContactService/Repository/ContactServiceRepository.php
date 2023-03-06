<?php

namespace App\Services\ContactService\Repository;

use App\Services\ContactService\Models\Contact;
use App\Services\ServiceManagement\Repository\BaseRepository;

class ContactServiceRepository extends BaseRepository implements ContactServiceInterface
{

    public function getModelName(): string
    {
        return Contact::class;
    }
}
