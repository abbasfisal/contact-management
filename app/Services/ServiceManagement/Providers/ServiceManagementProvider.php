<?php

namespace App\Services\ServiceManagement\Providers;

use App\Services\ContactService\Providers\ContactServiceProvider;

use Illuminate\Support\ServiceProvider;

class ServiceManagementProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(ContactServiceProvider::class);
    }
}
