<?php

namespace App\Services\ContactService\Providers;

use App\Services\ContactService\Repository\CustomerServiceInterface;
use App\Services\ContactService\Repository\CustomerServiceRepository;
use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');


    }
}
