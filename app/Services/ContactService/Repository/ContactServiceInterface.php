<?php

namespace App\Services\ContactService\Repository;

use App\Services\ServiceManagement\Repository\BaseRepositoryInterface;

interface ContactServiceInterface extends BaseRepositoryInterface
{

    public function createAnonymous(array $data);
}
