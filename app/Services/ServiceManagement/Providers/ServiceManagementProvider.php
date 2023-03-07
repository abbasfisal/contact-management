<?php

namespace App\Services\ServiceManagement\Providers;

use App\Services\ContactService\Providers\ContactServiceProvider;
use App\Services\ContactService\Repository\ContactServiceInterface;
use App\Services\ContactService\Repository\ContactServiceRepository;
use App\Services\ContactService\Repository\CustomerServiceInterface;
use App\Services\ContactService\Repository\CustomerServiceRepository;
use Illuminate\Support\ServiceProvider;

class ServiceManagementProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(ContactServiceInterface::class, ContactServiceRepository::class);
        $this->app->bind(CustomerServiceInterface::class  , CustomerServiceRepository::class);

    }

    public function register()
    {
        $this->app->register(ContactServiceProvider::class);
    }
}
