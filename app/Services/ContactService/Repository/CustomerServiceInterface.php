<?php

namespace App\Services\ContactService\Repository;

use App\Services\ServiceManagement\Repository\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

interface CustomerServiceInterface extends BaseRepositoryInterface
{
    public function findByMobile($mobile): ?Model;
}
